<?php

namespace Alcaeus\Benchmark\MongoDB;

use MongoDB\BSON\ObjectId;
use MongoDB\Collection;
use PhpBench\Attributes as Bench;
use function range;

final class UpdateOneArrayBench extends AbstractOperatorPipelineBench
{
    private int $pushTarget;
    private int $pullTarget;
    private int $pullAllTarget;
    private int $addToSetTarget;

    protected function getCollectionName(): string
    {
        return 'update_one_array';
    }

    protected function seedDocument(Collection $collection): ObjectId
    {
        // Seeded with more elements than a single iteration has revs, so $pop/$pull/
        // $pullAll never run out mid-iteration and silently degrade into no-ops.
        $result = $collection->insertOne(['tags' => range(0, 1999)]);

        $this->pushTarget = 2000;
        $this->pullTarget = 0;
        $this->pullAllTarget = 0;
        $this->addToSetTarget = 2000;

        return $result->getInsertedId();
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchPush(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$push' => ['tags' => $this->pushTarget++]]),
            fn () => $this->update([['$set' => ['tags' => ['$concatArrays' => ['$tags', [$this->pushTarget++]]]]]]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchPop(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$pop' => ['tags' => 1]]),
            fn () => $this->update([
                [
                    '$set' => [
                        'tags' => [
                            '$slice' => ['$tags', 0, ['$subtract' => [['$size' => '$tags'], 1]]],
                        ],
                    ],
                ],
            ]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchPull(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$pull' => ['tags' => $this->pullTarget++]]),
            fn () => $this->update([
                [
                    '$set' => [
                        'tags' => [
                            '$filter' => [
                                'input' => '$tags',
                                'cond' => ['$ne' => ['$$this', $this->pullTarget++]],
                            ],
                        ],
                    ],
                ],
            ]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchPullAll(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$pullAll' => ['tags' => [$this->pullAllTarget++]]]),
            fn () => $this->update([
                [
                    '$set' => [
                        'tags' => [
                            '$filter' => [
                                'input' => '$tags',
                                'cond' => ['$not' => [['$in' => ['$$this', [$this->pullAllTarget++]]]]],
                            ],
                        ],
                    ],
                ],
            ]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchAddToSet(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$addToSet' => ['tags' => $this->addToSetTarget++]]),
            fn () => $this->update([['$set' => ['tags' => ['$setUnion' => ['$tags', [$this->addToSetTarget++]]]]]]),
        );
    }
}
