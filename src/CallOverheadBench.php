<?php

namespace Alcaeus\Benchmark;

use PhpBench\Attributes as Bench;
use stdClass;

#[Bench\BeforeMethods('setUp')]
#[Bench\Revs(1000)]
final class CallOverheadBench
{
    private stdClass $object;

    public function setUp(): void
    {
        $this->object = (object) ['foo' => 'bar'];
    }

    public function benchHydrateDirectAccess(): void
    {
        $object = new stdClass();
        $object->foo = $this->object->foo;
    }

    public function benchHydrateMethod(): void
    {
        $object = new stdClass();
        $this->hydrate($object);
    }

    private function hydrate(stdClass $object): void
    {
        $object->foo = $this->object->foo;
    }
}
