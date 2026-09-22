<?php

namespace Alcaeus\Benchmark\MongoDB;

use MongoDB\BSON\ObjectId;
use MongoDB\Collection;
use PhpBench\Attributes as Bench;

final class UpdateOneBench extends AbstractOperatorPipelineBench
{
    private int $setTarget;
    private int $multiSetTarget;
    private int $minTarget;
    private int $maxTarget;

    protected function getCollectionName(): string
    {
        return 'update_one';
    }

    protected function seedDocument(Collection $collection): ObjectId
    {
        $result = $collection->insertOne([
            'counter' => 1,
            'fieldA' => 1,
            'fieldB' => 1,
            'fieldC' => 1,
        ]);

        // MongoDB skips the write when a $set (operator or pipeline) would leave the
        // document unchanged, so walk the target away from the seed on every rev to
        // guarantee each call performs a real update rather than a no-op.
        $this->setTarget = 2;
        $this->multiSetTarget = 2;
        $this->minTarget = 0;
        $this->maxTarget = 2;

        return $result->getInsertedId();
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchSet(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$set' => ['counter' => $this->setTarget++]]),
            fn () => $this->update([['$set' => ['counter' => $this->setTarget++]]]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchSetMultiple(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$set' => [
                'fieldA' => $this->multiSetTarget,
                'fieldB' => $this->multiSetTarget + 1,
                'fieldC' => $this->multiSetTarget + 2,
            ]]),
            fn () => $this->update([[
                '$set' => [
                    'fieldA' => $this->multiSetTarget,
                    'fieldB' => $this->multiSetTarget + 1,
                    'fieldC' => $this->multiSetTarget + 2,
                ],
            ]]),
        );

        $this->multiSetTarget++;
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchInc(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$inc' => ['counter' => 1]]),
            fn () => $this->update([['$set' => ['counter' => ['$sum' => ['$counter', 1]]]]]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchMul(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$mul' => ['counter' => 1.01]]),
            fn () => $this->update([['$set' => ['counter' => ['$multiply' => ['$counter', 1.01]]]]]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchMin(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$min' => ['counter' => $this->minTarget--]]),
            fn () => $this->update([['$set' => ['counter' => ['$min' => ['$counter', $this->minTarget--]]]]]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchMax(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$max' => ['counter' => $this->maxTarget++]]),
            fn () => $this->update([['$set' => ['counter' => ['$max' => ['$counter', $this->maxTarget++]]]]]),
        );
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchCurrentDate(array $params): void
    {
        $this->runStrategy(
            $params['strategy'],
            fn () => $this->update(['$currentDate' => ['updatedAt' => true]]),
            fn () => $this->update([['$set' => ['updatedAt' => '$$NOW']]]),
        );
    }
}
