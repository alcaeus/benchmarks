<?php

namespace Alcaeus\Benchmark\MongoDB;

use MongoDB\BSON\ObjectId;
use MongoDB\Collection;
use PhpBench\Attributes as Bench;
use function array_map;
use function range;

/**
 * Extends UpdateOneArrayCombinedBench to a collection of embedded documents, and adds
 * a third operation: setting a field inside one matching embedded document, alongside
 * the push and pull. All three touch the same top-level "items" path, so the classic
 * API needs three sequential updateOne() calls; an aggregation pipeline update can
 * still do it in one.
 */
final class UpdateOneEmbeddedArrayCombinedBench extends AbstractOperatorPipelineBench
{
    private int $pushTarget;
    private int $pullTarget;
    private int $changeTarget;

    protected function getCollectionName(): string
    {
        return 'update_one_embedded_array_combined';
    }

    protected function seedDocument(Collection $collection): ObjectId
    {
        // 2000 embedded docs give 1000 distinct ids for $set-in-place and 1000 more for
        // $pull, so neither runs out mid-iteration; pushed docs live in a disjoint id
        // range so they never collide with the seed or with each other.
        $items = array_map(
            static fn (int $i): array => ['id' => $i, 'value' => $i],
            range(0, 1999),
        );

        $result = $collection->insertOne(['items' => $items]);

        $this->pushTarget = 5_000_000;
        $this->pullTarget = 1000;
        $this->changeTarget = 0;

        return $result->getInsertedId();
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchSetPushPull(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            function (): void {
                $this->update(
                    ['$set' => ['items.$[elem].value' => $this->changeTarget + 3_000_000]],
                    ['arrayFilters' => [['elem.id' => $this->changeTarget]]],
                );
                $this->update(['$push' => ['items' => ['id' => $this->pushTarget, 'value' => $this->pushTarget]]]);
                $this->update(['$pull' => ['items' => ['id' => $this->pullTarget]]]);
            },
            fn () => $this->update([
                [
                    '$set' => [
                        'items' => [
                            '$concatArrays' => [
                                [
                                    '$filter' => [
                                        'input' => [
                                            '$map' => [
                                                'input' => '$items',
                                                'in' => [
                                                    '$cond' => [
                                                        ['$eq' => ['$$this.id', $this->changeTarget]],
                                                        ['$mergeObjects' => ['$$this', ['value' => $this->changeTarget + 3_000_000]]],
                                                        '$$this',
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'cond' => ['$ne' => ['$$this.id', $this->pullTarget]],
                                    ],
                                ],
                                [['id' => $this->pushTarget, 'value' => $this->pushTarget]],
                            ],
                        ],
                    ],
                ],
            ]),
        );

        $this->pushTarget++;
        $this->pullTarget++;
        $this->changeTarget++;
    }
}
