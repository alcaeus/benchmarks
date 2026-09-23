# Benchmark Report

Generated on 2026-09-23 with PHP 8.5.10 on macOS 27.0.

Regenerate with `composer report` (requires Docker for the MongoDB benchmarks).

```
+------+-----------------------+---------------------------+-----+------+----------+-----------+--------------+----------------+
| iter | benchmark             | subject                   | set | revs | mem_peak | time_avg  | comp_z_value | comp_deviation |
+------+-----------------------+---------------------------+-----+------+----------+-----------+--------------+----------------+
| 0    | CallOverheadBench     | benchHydrateDirectAccess  |     | 1000 | 779,720b | 0.196μs   | +0.00σ       | +0.00%         |
| 0    | CallOverheadBench     | benchHydrateMethod        |     | 1000 | 779,704b | 0.352μs   | +0.00σ       | +0.00%         |
| 0    | LazyLoadOverloadBench | benchDirectInitialisation |     | 1000 | 779,736b | 662.675μs | +0.00σ       | +0.00%         |
| 0    | LazyLoadOverloadBench | benchLazyGhost            |     | 1000 | 779,704b | 643.885μs | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench    | benchIssetArray           |     | 1000 | 836,608b | 0.249μs   | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench    | benchIssetObjectStorage   |     | 1000 | 836,616b | 0.154μs   | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench    | benchGetArray             |     | 1000 | 836,608b | 0.162μs   | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench    | benchGetObjectStorage     |     | 1000 | 836,616b | 0.151μs   | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench    | benchUnsetArray           |     | 1000 | 836,608b | 0.236μs   | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench    | benchUnsetObjectStorage   |     | 1000 | 836,616b | 0.144μs   | +0.00σ       | +0.00%         |
+------+-----------------------+---------------------------+-----+------+----------+-----------+--------------+----------------+
```

**Note:** the `Alcaeus\Benchmark\MongoDB\*` benchmarks (operator vs. aggregation-pipeline
update comparisons) are omitted from this report. They require a MongoDB replica set,
started automatically by `composer report` via Docker Compose; the environment used to
generate this report could not start `mongo:8` (Docker Desktop's Linux VM kernel trips
[SERVER-121912](https://jira.mongodb.org/browse/SERVER-121912)). Run `composer report`
on a host where the MongoDB container starts successfully to fill in that section.
