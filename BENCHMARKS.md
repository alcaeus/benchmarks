# Benchmark Report

Generated on 2026-09-23 10:31:47 UTC with PHP 8.5.10.

Regenerate with `composer report` (requires Docker for the MongoDB benchmarks).

```
+------+-------------------------------------+---------------------------+----------+------+------------+--------------+--------------+----------------+
| iter | benchmark                           | subject                   | set      | revs | mem_peak   | time_avg     | comp_z_value | comp_deviation |
+------+-------------------------------------+---------------------------+----------+------+------------+--------------+--------------+----------------+
| 0    | LazyLoadOverloadBench               | benchDirectInitialisation |          | 1000 | 779,640b   | 684.376μs    | +0.00σ       | +0.00%         |
| 0    | LazyLoadOverloadBench               | benchLazyGhost            |          | 1000 | 779,608b   | 667.942μs    | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchIssetArray           |          | 1000 | 836,896b   | 0.275μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchIssetObjectStorage   |          | 1000 | 836,904b   | 0.156μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchGetArray             |          | 1000 | 836,896b   | 0.157μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchGetObjectStorage     |          | 1000 | 836,904b   | 0.156μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchUnsetArray           |          | 1000 | 836,896b   | 0.249μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchUnsetObjectStorage   |          | 1000 | 836,904b   | 0.150μs      | +0.00σ       | +0.00%         |
| 0    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | operator | 1000 | 1,970,288b | 4,941.487μs  | -1.00σ       | -2.12%         |
| 1    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | operator | 1000 | 1,970,288b | 5,155.550μs  | +1.00σ       | +2.12%         |
| 0    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | pipeline | 1000 | 1,970,288b | 3,791.733μs  | -1.00σ       | -3.44%         |
| 1    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | pipeline | 1000 | 1,970,288b | 4,061.700μs  | +1.00σ       | +3.44%         |
| 0    | MultiDocumentUpdateBench            | benchUpdate               | operator | 200  | 1,325,280b | 30,600.680μs | -1.00σ       | -4.47%         |
| 1    | MultiDocumentUpdateBench            | benchUpdate               | operator | 200  | 1,325,280b | 33,464.130μs | +1.00σ       | +4.47%         |
| 0    | MultiDocumentUpdateBench            | benchUpdate               | pipeline | 200  | 1,342,504b | 3,184.120μs  | +1.00σ       | +4.92%         |
| 1    | MultiDocumentUpdateBench            | benchUpdate               | pipeline | 200  | 1,342,504b | 2,885.765μs  | -1.00σ       | -4.92%         |
| 0    | UpdateOneBench                      | benchSet                  | operator | 1000 | 1,347,008b | 1,682.168μs  | +1.00σ       | +7.96%         |
| 1    | UpdateOneBench                      | benchSet                  | operator | 1000 | 1,347,008b | 1,434.036μs  | -1.00σ       | -7.96%         |
| 0    | UpdateOneBench                      | benchSet                  | pipeline | 1000 | 1,347,008b | 1,577.542μs  | -1.00σ       | -4.88%         |
| 1    | UpdateOneBench                      | benchSet                  | pipeline | 1000 | 1,347,008b | 1,739.532μs  | +1.00σ       | +4.88%         |
| 0    | UpdateOneBench                      | benchSetMultiple          | operator | 1000 | 1,347,016b | 1,521.463μs  | -1.00σ       | -4.92%         |
| 1    | UpdateOneBench                      | benchSetMultiple          | operator | 1000 | 1,347,016b | 1,678.992μs  | +1.00σ       | +4.92%         |
| 0    | UpdateOneBench                      | benchSetMultiple          | pipeline | 1000 | 1,347,016b | 1,482.841μs  | -1.00σ       | -12.23%        |
| 1    | UpdateOneBench                      | benchSetMultiple          | pipeline | 1000 | 1,347,016b | 1,895.982μs  | +1.00σ       | +12.23%        |
| 0    | UpdateOneBench                      | benchInc                  | operator | 1000 | 1,347,008b | 1,693.941μs  | +1.00σ       | +0.14%         |
| 1    | UpdateOneBench                      | benchInc                  | operator | 1000 | 1,347,008b | 1,689.233μs  | -1.00σ       | -0.14%         |
| 0    | UpdateOneBench                      | benchInc                  | pipeline | 1000 | 1,347,008b | 1,231.961μs  | -1.00σ       | -0.32%         |
| 1    | UpdateOneBench                      | benchInc                  | pipeline | 1000 | 1,347,008b | 1,239.984μs  | +1.00σ       | +0.32%         |
| 0    | UpdateOneBench                      | benchMul                  | operator | 1000 | 1,347,008b | 1,350.692μs  | -1.00σ       | -0.92%         |
| 1    | UpdateOneBench                      | benchMul                  | operator | 1000 | 1,347,008b | 1,375.698μs  | +1.00σ       | +0.92%         |
| 0    | UpdateOneBench                      | benchMul                  | pipeline | 1000 | 1,347,008b | 1,739.559μs  | +1.00σ       | +1.65%         |
| 1    | UpdateOneBench                      | benchMul                  | pipeline | 1000 | 1,347,008b | 1,683.053μs  | -1.00σ       | -1.65%         |
| 0    | UpdateOneBench                      | benchMin                  | operator | 1000 | 1,347,008b | 772.101μs    | -1.00σ       | -21.05%        |
| 1    | UpdateOneBench                      | benchMin                  | operator | 1000 | 1,347,008b | 1,183.737μs  | +1.00σ       | +21.05%        |
| 0    | UpdateOneBench                      | benchMin                  | pipeline | 1000 | 1,347,008b | 1,266.926μs  | +1.00σ       | +4.53%         |
| 1    | UpdateOneBench                      | benchMin                  | pipeline | 1000 | 1,347,008b | 1,157.011μs  | -1.00σ       | -4.53%         |
| 0    | UpdateOneBench                      | benchMax                  | operator | 1000 | 1,347,008b | 1,208.429μs  | -1.00σ       | -1.23%         |
| 1    | UpdateOneBench                      | benchMax                  | operator | 1000 | 1,347,008b | 1,238.519μs  | +1.00σ       | +1.23%         |
| 0    | UpdateOneBench                      | benchMax                  | pipeline | 1000 | 1,347,008b | 1,549.069μs  | -1.00σ       | -0.79%         |
| 1    | UpdateOneBench                      | benchMax                  | pipeline | 1000 | 1,347,008b | 1,573.620μs  | +1.00σ       | +0.79%         |
| 0    | UpdateOneBench                      | benchCurrentDate          | operator | 1000 | 1,347,016b | 1,192.439μs  | +1.00σ       | +26.48%        |
| 1    | UpdateOneBench                      | benchCurrentDate          | operator | 1000 | 1,347,016b | 693.169μs    | -1.00σ       | -26.48%        |
| 0    | UpdateOneBench                      | benchCurrentDate          | pipeline | 1000 | 1,347,016b | 757.355μs    | +1.00σ       | +4.10%         |
| 1    | UpdateOneBench                      | benchCurrentDate          | pipeline | 1000 | 1,347,016b | 697.751μs    | -1.00σ       | -4.10%         |
| 0    | UpdateOneArrayCombinedBench         | benchPushPull             | operator | 1000 | 1,330,896b | 3,554.700μs  | +1.00σ       | +7.60%         |
| 1    | UpdateOneArrayCombinedBench         | benchPushPull             | operator | 1000 | 1,330,896b | 3,052.819μs  | -1.00σ       | -7.60%         |
| 0    | UpdateOneArrayCombinedBench         | benchPushPull             | pipeline | 1000 | 1,330,896b | 2,337.729μs  | -1.00σ       | -1.17%         |
| 1    | UpdateOneArrayCombinedBench         | benchPushPull             | pipeline | 1000 | 1,330,896b | 2,392.950μs  | +1.00σ       | +1.17%         |
| 0    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | operator | 1000 | 1,330,904b | 2,960.355μs  | +1.00σ       | +2.53%         |
| 1    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | operator | 1000 | 1,330,904b | 2,814.031μs  | -1.00σ       | -2.53%         |
| 0    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | pipeline | 1000 | 1,330,904b | 2,028.756μs  | +1.00σ       | +2.25%         |
| 1    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | pipeline | 1000 | 1,330,904b | 1,939.349μs  | -1.00σ       | -2.25%         |
| 0    | UpdateOneArrayBench                 | benchPush                 | operator | 1000 | 1,339,400b | 1,922.749μs  | +1.00σ       | +9.49%         |
| 1    | UpdateOneArrayBench                 | benchPush                 | operator | 1000 | 1,339,400b | 1,589.459μs  | -1.00σ       | -9.49%         |
| 0    | UpdateOneArrayBench                 | benchPush                 | pipeline | 1000 | 1,339,400b | 2,063.985μs  | -1.00σ       | -1.34%         |
| 1    | UpdateOneArrayBench                 | benchPush                 | pipeline | 1000 | 1,339,400b | 2,120.172μs  | +1.00σ       | +1.34%         |
| 0    | UpdateOneArrayBench                 | benchPop                  | operator | 1000 | 1,339,400b | 2,460.757μs  | +1.00σ       | +3.80%         |
| 1    | UpdateOneArrayBench                 | benchPop                  | operator | 1000 | 1,339,400b | 2,280.658μs  | -1.00σ       | -3.80%         |
| 0    | UpdateOneArrayBench                 | benchPop                  | pipeline | 1000 | 1,339,400b | 2,152.436μs  | -1.00σ       | -1.08%         |
| 1    | UpdateOneArrayBench                 | benchPop                  | pipeline | 1000 | 1,339,400b | 2,199.280μs  | +1.00σ       | +1.08%         |
| 0    | UpdateOneArrayBench                 | benchPull                 | operator | 1000 | 1,339,400b | 2,370.499μs  | +1.00σ       | +8.07%         |
| 1    | UpdateOneArrayBench                 | benchPull                 | operator | 1000 | 1,339,400b | 2,016.417μs  | -1.00σ       | -8.07%         |
| 0    | UpdateOneArrayBench                 | benchPull                 | pipeline | 1000 | 1,339,400b | 2,397.354μs  | +1.00σ       | +0.90%         |
| 1    | UpdateOneArrayBench                 | benchPull                 | pipeline | 1000 | 1,339,400b | 2,354.635μs  | -1.00σ       | -0.90%         |
| 0    | UpdateOneArrayBench                 | benchPullAll              | operator | 1000 | 1,339,400b | 2,273.427μs  | -1.00σ       | -0.70%         |
| 1    | UpdateOneArrayBench                 | benchPullAll              | operator | 1000 | 1,339,400b | 2,305.358μs  | +1.00σ       | +0.70%         |
| 0    | UpdateOneArrayBench                 | benchPullAll              | pipeline | 1000 | 1,339,400b | 2,386.282μs  | -1.00σ       | -1.11%         |
| 1    | UpdateOneArrayBench                 | benchPullAll              | pipeline | 1000 | 1,339,400b | 2,439.697μs  | +1.00σ       | +1.11%         |
| 0    | UpdateOneArrayBench                 | benchAddToSet             | operator | 1000 | 1,339,400b | 1,350.162μs  | -1.00σ       | -2.45%         |
| 1    | UpdateOneArrayBench                 | benchAddToSet             | operator | 1000 | 1,339,400b | 1,418.008μs  | +1.00σ       | +2.45%         |
| 0    | UpdateOneArrayBench                 | benchAddToSet             | pipeline | 1000 | 1,339,400b | 2,097.503μs  | +1.00σ       | +2.15%         |
| 1    | UpdateOneArrayBench                 | benchAddToSet             | pipeline | 1000 | 1,339,400b | 2,009.207μs  | -1.00σ       | -2.15%         |
| 0    | CallOverheadBench                   | benchHydrateDirectAccess  |          | 1000 | 779,624b   | 0.205μs      | +0.00σ       | +0.00%         |
| 0    | CallOverheadBench                   | benchHydrateMethod        |          | 1000 | 779,608b   | 0.356μs      | +0.00σ       | +0.00%         |
+------+-------------------------------------+---------------------------+----------+------+------------+--------------+--------------+----------------+

Operator vs Pipeline
+-------------------------------------+--------------------+-----------+-----------+---------+
| benchmark                           | subject            | operator  | pipeline  | delta   |
+-------------------------------------+--------------------+-----------+-----------+---------+
| UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull   | 5.048ms   | 3.927ms   | -22.21% |
| MultiDocumentUpdateBench            | benchUpdate        | 32.032ms  | 3.035ms   | -90.53% |
| UpdateOneBench                      | benchSet           | 1.558ms   | 1.659ms   | +6.46%  |
| UpdateOneBench                      | benchSetMultiple   | 1.600ms   | 1.690ms   | +5.59%  |
| UpdateOneBench                      | benchInc           | 1.692ms   | 1.236ms   | -26.93% |
| UpdateOneBench                      | benchMul           | 1.363ms   | 1.711ms   | +25.53% |
| UpdateOneBench                      | benchMin           | 977.919μs | 1.212ms   | +23.94% |
| UpdateOneBench                      | benchMax           | 1.224ms   | 1.561ms   | +27.61% |
| UpdateOneBench                      | benchCurrentDate   | 942.804μs | 727.553μs | -22.83% |
| UpdateOneArrayCombinedBench         | benchPushPull      | 3.304ms   | 2.365ms   | -28.41% |
| UpdateOneArrayCombinedBench         | benchChangeAndPush | 2.887ms   | 1.984ms   | -31.28% |
| UpdateOneArrayBench                 | benchPush          | 1.756ms   | 2.092ms   | +19.13% |
| UpdateOneArrayBench                 | benchPop           | 2.371ms   | 2.176ms   | -8.22%  |
| UpdateOneArrayBench                 | benchPull          | 2.194ms   | 2.376ms   | +8.30%  |
| UpdateOneArrayBench                 | benchPullAll       | 2.289ms   | 2.413ms   | +5.40%  |
| UpdateOneArrayBench                 | benchAddToSet      | 1.384ms   | 2.053ms   | +48.36% |
+-------------------------------------+--------------------+-----------+-----------+---------+
```
