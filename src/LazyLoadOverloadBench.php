<?php

namespace Alcaeus\Benchmark;

use PhpBench\Attributes as Bench;
use ReflectionClass;
use stdClass;

#[Bench\BeforeMethods('setUp')]
#[Bench\Revs(1000)]
final class LazyLoadOverloadBench
{
    private ReflectionClass $reflectionClass;

    public function setUp(): void
    {
        $this->reflectionClass = new ReflectionClass(LazyObject::class);
    }

    public function benchDirectInitialisation(): void
    {
        $object = new LazyObject();
        $this->initialise($object);
        assert(is_string($object->foo));
    }

    public function benchLazyGhost(): void
    {
        $object = $this->reflectionClass->newLazyGhost($this->initialise(...));
        assert(is_string($object->foo));
    }

    private function initialise(LazyObject $object): void
    {
        $object->foo = 'bar';
        usleep(500);
    }
}

class LazyObject
{
    public string $foo;
}
