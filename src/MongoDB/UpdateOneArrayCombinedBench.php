<?php

namespace Alcaeus\Benchmark\MongoDB;

use MongoDB\BSON\ObjectId;
use MongoDB\Collection;
use PhpBench\Attributes as Bench;
use function range;

/**
 * Some array updates can't be expressed as a single classic update document because
 * they'd modify the same field path twice (e.g. $push and $pull on the same array, or
 * a positional $set alongside a $push). The classic API needs two sequential
 * updateOne() calls for these; an aggregation pipeline update can do it in one.
 */
final class UpdateOneArrayCombinedBench extends AbstractOperatorPipelineBench
{
    private int $pushTarget;
    private int $pullTarget;
    private int $changeTarget;

    protected function getCollectionName(): string
    {
        return 'update_one_array_combined';
    }

    protected function seedDocument(Collection $collection): ObjectId
    {
        // Seeded with more elements than a single iteration has revs, so $pull and the
        // positional element update never run out mid-iteration and silently degrade
        // into no-ops. Pushed/changed-to values live in disjoint numeric ranges so they
        // never collide with the seed or with each other.
        $result = $collection->insertOne(['tags' => range(0, 1999)]);

        $this->pushTarget = 1_000_000;
        $this->pullTarget = 0;
        $this->changeTarget = 0;

        return $result->getInsertedId();
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchPushPull(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            function (): void {
                $this->update(['$push' => ['tags' => $this->pushTarget++]]);
                $this->update(['$pull' => ['tags' => $this->pullTarget++]]);
            },
            fn () => $this->update([
                [
                    '$set' => [
                        'tags' => [
                            '$concatArrays' => [
                                [
                                    '$filter' => [
                                        'input' => '$tags',
                                        'cond' => ['$ne' => ['$$this', $this->pullTarget++]],
                                    ],
                                ],
                                [$this->pushTarget++],
                            ],
                        ],
                    ],
                ],
            ]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchChangeAndPush(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            function (): void {
                $this->collection->updateOne(
                    ['_id' => $this->id, 'tags' => $this->changeTarget],
                    ['$set' => ['tags.$' => $this->changeTarget + 2_000_000]],
                );
                $this->update(['$push' => ['tags' => $this->pushTarget++]]);
            },
            fn () => $this->update([
                [
                    '$set' => [
                        'tags' => [
                            '$concatArrays' => [
                                [
                                    '$map' => [
                                        'input' => '$tags',
                                        'in' => [
                                            '$cond' => [
                                                ['$eq' => ['$$this', $this->changeTarget]],
                                                $this->changeTarget + 2_000_000,
                                                '$$this',
                                            ],
                                        ],
                                    ],
                                ],
                                [$this->pushTarget++],
                            ],
                        ],
                    ],
                ],
            ]),
        );

        $this->changeTarget++;
    }
}
