# Benchmark Report

Generated on 2026-09-23 10:21:46 UTC with PHP 8.5.10.

Regenerate with `composer report` (requires Docker for the MongoDB benchmarks).

```
+------+-------------------------------------+---------------------------+----------+------+------------+--------------+--------------+----------------+
| iter | benchmark                           | subject                   | set      | revs | mem_peak   | time_avg     | comp_z_value | comp_deviation |
+------+-------------------------------------+---------------------------+----------+------+------------+--------------+--------------+----------------+
| 0    | LazyLoadOverloadBench               | benchDirectInitialisation |          | 1000 | 779,640b   | 633.435μs    | +0.00σ       | +0.00%         |
| 0    | LazyLoadOverloadBench               | benchLazyGhost            |          | 1000 | 779,608b   | 637.958μs    | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchIssetArray           |          | 1000 | 836,896b   | 0.267μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchIssetObjectStorage   |          | 1000 | 836,904b   | 0.155μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchGetArray             |          | 1000 | 836,896b   | 0.149μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchGetObjectStorage     |          | 1000 | 836,904b   | 0.151μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchUnsetArray           |          | 1000 | 836,896b   | 0.248μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchUnsetObjectStorage   |          | 1000 | 836,904b   | 0.147μs      | +0.00σ       | +0.00%         |
| 0    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | operator | 1000 | 1,970,288b | 5,027.922μs  | -1.00σ       | -8.36%         |
| 1    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | operator | 1000 | 1,970,288b | 5,945.063μs  | +1.00σ       | +8.36%         |
| 0    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | pipeline | 1000 | 1,970,288b | 3,946.649μs  | -1.00σ       | -3.08%         |
| 1    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | pipeline | 1000 | 1,970,288b | 4,197.306μs  | +1.00σ       | +3.08%         |
| 0    | MultiDocumentUpdateBench            | benchUpdate               | operator | 200  | 1,325,280b | 25,827.440μs | -1.00σ       | -1.90%         |
| 1    | MultiDocumentUpdateBench            | benchUpdate               | operator | 200  | 1,325,280b | 26,827.160μs | +1.00σ       | +1.90%         |
| 0    | MultiDocumentUpdateBench            | benchUpdate               | pipeline | 200  | 1,342,504b | 3,610.090μs  | +1.00σ       | +9.48%         |
| 1    | MultiDocumentUpdateBench            | benchUpdate               | pipeline | 200  | 1,342,504b | 2,984.805μs  | -1.00σ       | -9.48%         |
| 0    | UpdateOneBench                      | benchSet                  | operator | 1000 | 1,347,008b | 1,260.344μs  | -1.00σ       | -4.43%         |
| 1    | UpdateOneBench                      | benchSet                  | operator | 1000 | 1,347,008b | 1,377.151μs  | +1.00σ       | +4.43%         |
| 0    | UpdateOneBench                      | benchSet                  | pipeline | 1000 | 1,347,008b | 1,312.326μs  | -1.00σ       | -1.47%         |
| 1    | UpdateOneBench                      | benchSet                  | pipeline | 1000 | 1,347,008b | 1,351.476μs  | +1.00σ       | +1.47%         |
| 0    | UpdateOneBench                      | benchSetMultiple          | operator | 1000 | 1,347,016b | 1,265.512μs  | +1.00σ       | +0.82%         |
| 1    | UpdateOneBench                      | benchSetMultiple          | operator | 1000 | 1,347,016b | 1,244.868μs  | -1.00σ       | -0.82%         |
| 0    | UpdateOneBench                      | benchSetMultiple          | pipeline | 1000 | 1,347,016b | 1,413.172μs  | +1.00σ       | +5.52%         |
| 1    | UpdateOneBench                      | benchSetMultiple          | pipeline | 1000 | 1,347,016b | 1,265.208μs  | -1.00σ       | -5.52%         |
| 0    | UpdateOneBench                      | benchInc                  | operator | 1000 | 1,347,008b | 1,324.646μs  | -1.00σ       | -1.08%         |
| 1    | UpdateOneBench                      | benchInc                  | operator | 1000 | 1,347,008b | 1,353.578μs  | +1.00σ       | +1.08%         |
| 0    | UpdateOneBench                      | benchInc                  | pipeline | 1000 | 1,347,008b | 1,344.828μs  | -1.00σ       | -3.83%         |
| 1    | UpdateOneBench                      | benchInc                  | pipeline | 1000 | 1,347,008b | 1,452.076μs  | +1.00σ       | +3.83%         |
| 0    | UpdateOneBench                      | benchMul                  | operator | 1000 | 1,347,008b | 1,122.422μs  | -1.00σ       | -0.61%         |
| 1    | UpdateOneBench                      | benchMul                  | operator | 1000 | 1,347,008b | 1,136.265μs  | +1.00σ       | +0.61%         |
| 0    | UpdateOneBench                      | benchMul                  | pipeline | 1000 | 1,347,008b | 1,166.144μs  | +1.00σ       | +0.84%         |
| 1    | UpdateOneBench                      | benchMul                  | pipeline | 1000 | 1,347,008b | 1,146.789μs  | -1.00σ       | -0.84%         |
| 0    | UpdateOneBench                      | benchMin                  | operator | 1000 | 1,347,008b | 1,086.873μs  | -1.00σ       | -3.82%         |
| 1    | UpdateOneBench                      | benchMin                  | operator | 1000 | 1,347,008b | 1,173.259μs  | +1.00σ       | +3.82%         |
| 0    | UpdateOneBench                      | benchMin                  | pipeline | 1000 | 1,347,008b | 1,240.656μs  | -1.00σ       | -5.99%         |
| 1    | UpdateOneBench                      | benchMin                  | pipeline | 1000 | 1,347,008b | 1,398.863μs  | +1.00σ       | +5.99%         |
| 0    | UpdateOneBench                      | benchMax                  | operator | 1000 | 1,347,008b | 1,506.442μs  | +1.00σ       | +2.03%         |
| 1    | UpdateOneBench                      | benchMax                  | operator | 1000 | 1,347,008b | 1,446.504μs  | -1.00σ       | -2.03%         |
| 0    | UpdateOneBench                      | benchMax                  | pipeline | 1000 | 1,347,008b | 1,790.694μs  | +1.00σ       | +1.10%         |
| 1    | UpdateOneBench                      | benchMax                  | pipeline | 1000 | 1,347,008b | 1,751.661μs  | -1.00σ       | -1.10%         |
| 0    | UpdateOneBench                      | benchCurrentDate          | operator | 1000 | 1,347,016b | 1,402.699μs  | -1.00σ       | -0.07%         |
| 1    | UpdateOneBench                      | benchCurrentDate          | operator | 1000 | 1,347,016b | 1,404.804μs  | +1.00σ       | +0.07%         |
| 0    | UpdateOneBench                      | benchCurrentDate          | pipeline | 1000 | 1,347,016b | 1,376.657μs  | -1.00σ       | -2.00%         |
| 1    | UpdateOneBench                      | benchCurrentDate          | pipeline | 1000 | 1,347,016b | 1,432.951μs  | +1.00σ       | +2.00%         |
| 0    | UpdateOneArrayCombinedBench         | benchPushPull             | operator | 1000 | 1,330,896b | 3,567.384μs  | +1.00σ       | +6.05%         |
| 1    | UpdateOneArrayCombinedBench         | benchPushPull             | operator | 1000 | 1,330,896b | 3,160.387μs  | -1.00σ       | -6.05%         |
| 0    | UpdateOneArrayCombinedBench         | benchPushPull             | pipeline | 1000 | 1,330,896b | 2,484.360μs  | -1.00σ       | -3.54%         |
| 1    | UpdateOneArrayCombinedBench         | benchPushPull             | pipeline | 1000 | 1,330,896b | 2,666.697μs  | +1.00σ       | +3.54%         |
| 0    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | operator | 1000 | 1,330,904b | 2,548.755μs  | -1.00σ       | -8.24%         |
| 1    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | operator | 1000 | 1,330,904b | 3,006.778μs  | +1.00σ       | +8.24%         |
| 0    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | pipeline | 1000 | 1,330,904b | 2,168.331μs  | +1.00σ       | +4.98%         |
| 1    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | pipeline | 1000 | 1,330,904b | 1,962.469μs  | -1.00σ       | -4.98%         |
| 0    | UpdateOneArrayBench                 | benchPush                 | operator | 1000 | 1,339,400b | 1,437.694μs  | +1.00σ       | +4.44%         |
| 1    | UpdateOneArrayBench                 | benchPush                 | operator | 1000 | 1,339,400b | 1,315.510μs  | -1.00σ       | -4.44%         |
| 0    | UpdateOneArrayBench                 | benchPush                 | pipeline | 1000 | 1,339,400b | 1,396.411μs  | -1.00σ       | -17.90%        |
| 1    | UpdateOneArrayBench                 | benchPush                 | pipeline | 1000 | 1,339,400b | 2,005.367μs  | +1.00σ       | +17.90%        |
| 0    | UpdateOneArrayBench                 | benchPop                  | operator | 1000 | 1,339,400b | 1,886.178μs  | -1.00σ       | -7.49%         |
| 1    | UpdateOneArrayBench                 | benchPop                  | operator | 1000 | 1,339,400b | 2,191.687μs  | +1.00σ       | +7.49%         |
| 0    | UpdateOneArrayBench                 | benchPop                  | pipeline | 1000 | 1,339,400b | 2,070.117μs  | +1.00σ       | +0.13%         |
| 1    | UpdateOneArrayBench                 | benchPop                  | pipeline | 1000 | 1,339,400b | 2,064.807μs  | -1.00σ       | -0.13%         |
| 0    | UpdateOneArrayBench                 | benchPull                 | operator | 1000 | 1,339,400b | 1,919.351μs  | -1.00σ       | -8.58%         |
| 1    | UpdateOneArrayBench                 | benchPull                 | operator | 1000 | 1,339,400b | 2,279.804μs  | +1.00σ       | +8.58%         |
| 0    | UpdateOneArrayBench                 | benchPull                 | pipeline | 1000 | 1,339,400b | 2,214.526μs  | -1.00σ       | -6.29%         |
| 1    | UpdateOneArrayBench                 | benchPull                 | pipeline | 1000 | 1,339,400b | 2,511.751μs  | +1.00σ       | +6.29%         |
| 0    | UpdateOneArrayBench                 | benchPullAll              | operator | 1000 | 1,339,400b | 2,198.092μs  | -1.00σ       | -1.82%         |
| 1    | UpdateOneArrayBench                 | benchPullAll              | operator | 1000 | 1,339,400b | 2,279.711μs  | +1.00σ       | +1.82%         |
| 0    | UpdateOneArrayBench                 | benchPullAll              | pipeline | 1000 | 1,339,400b | 3,399.577μs  | -1.00σ       | -1.15%         |
| 1    | UpdateOneArrayBench                 | benchPullAll              | pipeline | 1000 | 1,339,400b | 3,478.908μs  | +1.00σ       | +1.15%         |
| 0    | UpdateOneArrayBench                 | benchAddToSet             | operator | 1000 | 1,339,400b | 1,533.452μs  | -1.00σ       | -1.50%         |
| 1    | UpdateOneArrayBench                 | benchAddToSet             | operator | 1000 | 1,339,400b | 1,580.170μs  | +1.00σ       | +1.50%         |
| 0    | UpdateOneArrayBench                 | benchAddToSet             | pipeline | 1000 | 1,339,400b | 2,185.269μs  | +1.00σ       | +2.48%         |
| 1    | UpdateOneArrayBench                 | benchAddToSet             | pipeline | 1000 | 1,339,400b | 2,079.571μs  | -1.00σ       | -2.48%         |
| 0    | CallOverheadBench                   | benchHydrateDirectAccess  |          | 1000 | 779,624b   | 0.235μs      | +0.00σ       | +0.00%         |
| 0    | CallOverheadBench                   | benchHydrateMethod        |          | 1000 | 779,608b   | 0.355μs      | +0.00σ       | +0.00%         |
+------+-------------------------------------+---------------------------+----------+------+------------+--------------+--------------+----------------+

Operator vs Pipeline
+-------------------------------------+---------------------------+----------+----------+---------+
| benchmark                           | subject                   | operator | pipeline | delta   |
+-------------------------------------+---------------------------+----------+----------+---------+
| LazyLoadOverloadBench               | benchDirectInitialisation | 0.000μs  | 0.000μs  | 0.00%   |
| LazyLoadOverloadBench               | benchLazyGhost            | 0.000μs  | 0.000μs  | 0.00%   |
| ObjectStorageBench                  | benchIssetArray           | 0.000μs  | 0.000μs  | 0.00%   |
| ObjectStorageBench                  | benchIssetObjectStorage   | 0.000μs  | 0.000μs  | 0.00%   |
| ObjectStorageBench                  | benchGetArray             | 0.000μs  | 0.000μs  | 0.00%   |
| ObjectStorageBench                  | benchGetObjectStorage     | 0.000μs  | 0.000μs  | 0.00%   |
| ObjectStorageBench                  | benchUnsetArray           | 0.000μs  | 0.000μs  | 0.00%   |
| ObjectStorageBench                  | benchUnsetObjectStorage   | 0.000μs  | 0.000μs  | 0.00%   |
| UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | 5.486ms  | 4.072ms  | -25.78% |
| MultiDocumentUpdateBench            | benchUpdate               | 26.326ms | 3.298ms  | -87.47% |
| UpdateOneBench                      | benchSet                  | 1.319ms  | 1.332ms  | +0.99%  |
| UpdateOneBench                      | benchSetMultiple          | 1.255ms  | 1.339ms  | +6.71%  |
| UpdateOneBench                      | benchInc                  | 1.339ms  | 1.398ms  | +4.43%  |
| UpdateOneBench                      | benchMul                  | 1.129ms  | 1.156ms  | +2.40%  |
| UpdateOneBench                      | benchMin                  | 1.130ms  | 1.320ms  | +16.81% |
| UpdateOneBench                      | benchMax                  | 1.476ms  | 1.771ms  | +19.96% |
| UpdateOneBench                      | benchCurrentDate          | 1.404ms  | 1.405ms  | +0.08%  |
| UpdateOneArrayCombinedBench         | benchPushPull             | 3.364ms  | 2.576ms  | -23.43% |
| UpdateOneArrayCombinedBench         | benchChangeAndPush        | 2.778ms  | 2.065ms  | -25.65% |
| UpdateOneArrayBench                 | benchPush                 | 1.377ms  | 1.701ms  | +23.56% |
| UpdateOneArrayBench                 | benchPop                  | 2.039ms  | 2.067ms  | +1.40%  |
| UpdateOneArrayBench                 | benchPull                 | 2.100ms  | 2.363ms  | +12.54% |
| UpdateOneArrayBench                 | benchPullAll              | 2.239ms  | 3.439ms  | +53.60% |
| UpdateOneArrayBench                 | benchAddToSet             | 1.557ms  | 2.132ms  | +36.97% |
| CallOverheadBench                   | benchHydrateDirectAccess  | 0.000μs  | 0.000μs  | 0.00%   |
| CallOverheadBench                   | benchHydrateMethod        | 0.000μs  | 0.000μs  | 0.00%   |
+-------------------------------------+---------------------------+----------+----------+---------+
```
