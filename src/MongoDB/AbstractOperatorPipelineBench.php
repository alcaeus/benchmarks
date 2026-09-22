<?php

namespace Alcaeus\Benchmark\MongoDB;

use MongoDB\BSON\ObjectId;
use MongoDB\Client;
use MongoDB\Collection;
use PhpBench\Attributes as Bench;
use function getenv;

/**
 * Base class for benchmarks that compare the classic update-operator API against
 * an equivalent aggregation-pipeline update. Concrete subclasses seed a document
 * via seedDocument() and express each A/B scenario as a single bench method that
 * dispatches to the operator or pipeline branch through runStrategy(), keyed by
 * the "strategy" param supplied by provideStrategy(). Each branch issues its own
 * updateOne() call(s) via the update() helper.
 */
#[Bench\BeforeMethods('prepareBenchmark')]
#[Bench\Revs(1000)]
#[Bench\Iterations(2)]
abstract class AbstractOperatorPipelineBench
{
    use ComparesStrategiesTrait;

    protected Collection $collection;
    protected ObjectId $id;

    public function prepareBenchmark(): void
    {
        $client = new Client(getenv('MONGODB_URI') ?: 'mongodb://127.0.0.1:27017/?replicaSet=rs0&directConnection=true');
        $this->collection = $client->selectCollection('benchmark', $this->getCollectionName());
        $this->collection->drop();
        $this->id = $this->seedDocument($this->collection);
    }

    /** Name of the collection this benchmark operates on. */
    abstract protected function getCollectionName(): string;

    /** Insert the seed document and return its _id. */
    abstract protected function seedDocument(Collection $collection): ObjectId;

    /** Issue a single updateOne() call against the seed document. */
    protected function update(array $update, array $options = []): void
    {
        $this->collection->updateOne(['_id' => $this->id], $update, $options);
    }
}
