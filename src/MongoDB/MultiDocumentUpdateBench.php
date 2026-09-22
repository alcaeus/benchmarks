<?php

namespace Alcaeus\Benchmark\MongoDB;

use MongoDB\Client;
use MongoDB\Collection;
use PhpBench\Attributes as Bench;
use function array_map;
use function getenv;
use function range;

/**
 * Mirrors the ODM's current behaviour of issuing one updateOne() per changed document
 * in a unit of work (the "operator" strategy, here meaning the current/classic
 * approach rather than a literal update operator), and compares it against a single
 * ordered Collection::bulkWrite() call carrying the same updateOne operations (the
 * "pipeline" strategy, standing in for "the alternative, more efficient approach").
 * This is the collection-level bulk write (MongoDB\Collection::bulkWrite()), not the
 * client-level MongoDB\Client::bulkWrite() introduced for cross-collection/-database
 * writes.
 */
#[Bench\BeforeMethods('prepareBenchmark')]
#[Bench\Revs(200)]
#[Bench\Iterations(2)]
final class MultiDocumentUpdateBench
{
    use ComparesStrategiesTrait;

    private const BATCH_SIZE = 20;

    private Collection $collection;
    /** @var list<int> */
    private array $ids;
    private int $target;

    public function prepareBenchmark(): void
    {
        $client = new Client(getenv('MONGODB_URI') ?: 'mongodb://127.0.0.1:27017/?replicaSet=rs0&directConnection=true');
        $this->collection = $client->selectCollection('benchmark', 'multi_document_update');
        $this->collection->drop();

        $result = $this->collection->insertMany(
            array_map(static fn (int $i): array => ['_id' => $i, 'counter' => 1], range(0, self::BATCH_SIZE - 1)),
        );
        $this->ids = $result->getInsertedIds();

        // Set every document to a shared, ever-increasing value each rev so MongoDB's
        // unmodified-document short-circuit never turns a later rev into a no-op.
        $this->target = 2;
    }

    #[Bench\ParamProviders('provideStrategy')]
    public function benchUpdate(array $params): void
    {
        $target = $this->target++;

        $this->runStrategy(
            $params['strategy'],
            function () use ($target): void {
                foreach ($this->ids as $id) {
                    $this->collection->updateOne(
                        ['_id' => $id],
                        ['$set' => ['counter' => $target]],
                    );
                }
            },
            function () use ($target): void {
                $operations = array_map(
                    static fn (int $id): array => ['updateOne' => [['_id' => $id], ['$set' => ['counter' => $target]]]],
                    $this->ids,
                );

                $this->collection->bulkWrite($operations, ['ordered' => true]);
            },
        );
    }
}
