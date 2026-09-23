# benchmark

A collection of [PHPBench](https://github.com/phpbench/phpbench) microbenchmarks,
covering:

- PHP language-level comparisons (call overhead, lazy-loading ghost objects,
  `SplObjectStorage` vs. plain arrays).
- MongoDB update strategies, comparing the classic update-operator API against
  equivalent aggregation-pipeline updates (`src/MongoDB`).

## Requirements

- PHP 8.4+
- [Composer](https://getcomposer.org/)
- [Docker Compose](https://docs.docker.com/compose/) (for the MongoDB benchmarks, which
  start a local replica set automatically)

## Usage

Install dependencies:

```shell
composer install
```

Run the full benchmark suite:

```shell
composer bench
```

This starts the MongoDB replica set via Docker Compose and runs `vendor/bin/phpbench
run`. Pass extra arguments through, e.g. to run a single benchmark class:

```shell
composer bench -- --filter=UpdateOneBench
```

## Benchmark report

The latest results are checked into [BENCHMARKS.md](BENCHMARKS.md). Regenerate it with:

```shell
composer report
```

(equivalent to running `bin/generate-report.sh` directly.) This starts the MongoDB
replica set via Docker Compose, runs the full `vendor/bin/phpbench` suite, and
overwrites `BENCHMARKS.md` with the new results — commit the updated file once you're
happy with it. Requires Docker Compose; no other setup is needed beyond `composer
install`.

## License

MIT, see [LICENSE](LICENSE).
