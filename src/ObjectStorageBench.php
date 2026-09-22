<?php

namespace Alcaeus\Benchmark;

use PhpBench\Attributes as Bench;
use SplObjectStorage;
use stdClass;

use function rand;
use function spl_object_id;

#[Bench\BeforeMethods('setUp')]
#[Bench\Revs(1000)]
final class ObjectStorageBench
{
    private array $objectArray = [];
    private SplObjectStorage $objects;
    private string $randomHash;
    private stdClass $randomObject;

    public function setUp(): void
    {
        $this->objects = new SplObjectStorage();

        for ($i = 0; $i < 1000; $i++) {
            $object = new stdClass();
            $this->objectArray[spl_object_id($object)] = $object;
            $this->objects[$object] = true;
        }

        $randomIndex = rand(0, $this->objects->count() - 1);
        $this->randomHash = array_keys($this->objectArray)[$randomIndex];
        $this->randomObject = $this->objectArray[$this->randomHash];
    }

    public function benchIssetArray(): void
    {
        $exists = isset($this->objectArray[spl_object_id($this->randomObject)]);
    }

    public function benchIssetObjectStorage(): void
    {
        $exists = isset($this->objects[$this->randomObject]);
    }

    public function benchGetArray(): void
    {
        $object = $this->objectArray[$this->randomHash];
    }

    public function benchGetObjectStorage(): void
    {
        $exists = $this->objects[$this->randomObject];
    }

    public function benchUnsetArray(): void
    {
        unset($this->objectArray[spl_object_id($this->randomObject)]);
    }

    public function benchUnsetObjectStorage(): void
    {
        unset($this->objects[$this->randomObject]);
    }
}
