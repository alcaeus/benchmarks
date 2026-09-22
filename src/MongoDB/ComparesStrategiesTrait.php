<?php

namespace Alcaeus\Benchmark\MongoDB;

/**
 * Shared A/B "strategy" dispatch for benchmarks comparing the current (classic)
 * approach against an alternative one. Each bench method takes a "strategy" param
 * supplied by provideStrategy() (via #[ParamProviders]) and picks a branch through
 * runStrategy(). Kept as a trait, rather than folded into AbstractOperatorPipelineBench,
 * so it can also be used by benchmarks whose seeding shape doesn't fit that class (e.g.
 * MultiDocumentUpdateBench, which seeds many documents rather than one).
 */
trait ComparesStrategiesTrait
{
    /** @return iterable<string,array{strategy:string}> */
    public static function provideStrategy(): iterable
    {
        yield 'operator' => ['strategy' => 'operator'];
        yield 'pipeline' => ['strategy' => 'pipeline'];
    }

    protected function runStrategy(string $strategy, callable $operator, callable $pipeline): void
    {
        match ($strategy) {
            'operator' => $operator(),
            'pipeline' => $pipeline(),
        };
    }
}
