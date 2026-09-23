# Benchmark Report

Generated on 2026-09-23 11:13:35 UTC with PHP 8.5.10.

Regenerate with `composer report` (requires Docker for the MongoDB benchmarks).

## Full run

| iter | benchmark                           | subject                   | set      | revs | mem_peak   | time_avg     | comp_z_value | comp_deviation |
| --- | --- | --- | --- | --- | --- | --- | --- | --- |
| 0    | LazyLoadOverloadBench               | benchDirectInitialisation |          | 1000 | 779,640b   | 639.194μs    | +0.00σ       | +0.00%         |
| 0    | LazyLoadOverloadBench               | benchLazyGhost            |          | 1000 | 779,608b   | 652.776μs    | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchIssetArray           |          | 1000 | 836,896b   | 0.276μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchIssetObjectStorage   |          | 1000 | 836,904b   | 0.155μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchGetArray             |          | 1000 | 836,896b   | 0.151μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchGetObjectStorage     |          | 1000 | 836,904b   | 0.149μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchUnsetArray           |          | 1000 | 836,896b   | 0.246μs      | +0.00σ       | +0.00%         |
| 0    | ObjectStorageBench                  | benchUnsetObjectStorage   |          | 1000 | 836,904b   | 0.144μs      | +0.00σ       | +0.00%         |
| 0    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | operator | 1000 | 1,970,288b | 5,081.873μs  | +1.00σ       | +0.25%         |
| 1    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | operator | 1000 | 1,970,288b | 5,056.889μs  | -1.00σ       | -0.25%         |
| 0    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | pipeline | 1000 | 1,970,288b | 3,688.723μs  | -1.00σ       | -0.42%         |
| 1    | UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull          | pipeline | 1000 | 1,970,288b | 3,719.910μs  | +1.00σ       | +0.42%         |
| 0    | MultiDocumentUpdateBench            | benchUpdate               | operator | 200  | 1,325,280b | 22,477.710μs | +1.00σ       | +0.70%         |
| 1    | MultiDocumentUpdateBench            | benchUpdate               | operator | 200  | 1,325,280b | 22,167.400μs | -1.00σ       | -0.70%         |
| 0    | MultiDocumentUpdateBench            | benchUpdate               | pipeline | 200  | 1,342,504b | 2,306.050μs  | +1.00σ       | +0.99%         |
| 1    | MultiDocumentUpdateBench            | benchUpdate               | pipeline | 200  | 1,342,504b | 2,261.030μs  | -1.00σ       | -0.99%         |
| 0    | UpdateOneBench                      | benchSet                  | operator | 1000 | 1,347,008b | 1,116.709μs  | +1.00σ       | +8.98%         |
| 1    | UpdateOneBench                      | benchSet                  | operator | 1000 | 1,347,008b | 932.747μs    | -1.00σ       | -8.98%         |
| 0    | UpdateOneBench                      | benchSet                  | pipeline | 1000 | 1,347,008b | 1,187.680μs  | +1.00σ       | +0.50%         |
| 1    | UpdateOneBench                      | benchSet                  | pipeline | 1000 | 1,347,008b | 1,175.881μs  | -1.00σ       | -0.50%         |
| 0    | UpdateOneBench                      | benchSetMultiple          | operator | 1000 | 1,347,016b | 1,035.736μs  | -1.00σ       | -4.39%         |
| 1    | UpdateOneBench                      | benchSetMultiple          | operator | 1000 | 1,347,016b | 1,130.813μs  | +1.00σ       | +4.39%         |
| 0    | UpdateOneBench                      | benchSetMultiple          | pipeline | 1000 | 1,347,016b | 1,118.129μs  | +1.00σ       | +4.41%         |
| 1    | UpdateOneBench                      | benchSetMultiple          | pipeline | 1000 | 1,347,016b | 1,023.774μs  | -1.00σ       | -4.41%         |
| 0    | UpdateOneBench                      | benchInc                  | operator | 1000 | 1,347,008b | 1,093.714μs  | -1.00σ       | -2.37%         |
| 1    | UpdateOneBench                      | benchInc                  | operator | 1000 | 1,347,008b | 1,146.874μs  | +1.00σ       | +2.37%         |
| 0    | UpdateOneBench                      | benchInc                  | pipeline | 1000 | 1,347,008b | 1,189.076μs  | -1.00σ       | -2.13%         |
| 1    | UpdateOneBench                      | benchInc                  | pipeline | 1000 | 1,347,008b | 1,240.818μs  | +1.00σ       | +2.13%         |
| 0    | UpdateOneBench                      | benchMul                  | operator | 1000 | 1,347,008b | 1,199.553μs  | -1.00σ       | -1.29%         |
| 1    | UpdateOneBench                      | benchMul                  | operator | 1000 | 1,347,008b | 1,230.840μs  | +1.00σ       | +1.29%         |
| 0    | UpdateOneBench                      | benchMul                  | pipeline | 1000 | 1,347,008b | 1,209.830μs  | -1.00σ       | -0.86%         |
| 1    | UpdateOneBench                      | benchMul                  | pipeline | 1000 | 1,347,008b | 1,230.864μs  | +1.00σ       | +0.86%         |
| 0    | UpdateOneBench                      | benchMin                  | operator | 1000 | 1,347,008b | 1,248.010μs  | +1.00σ       | +0.13%         |
| 1    | UpdateOneBench                      | benchMin                  | operator | 1000 | 1,347,008b | 1,244.657μs  | -1.00σ       | -0.13%         |
| 0    | UpdateOneBench                      | benchMin                  | pipeline | 1000 | 1,347,008b | 1,448.691μs  | +1.00σ       | +6.21%         |
| 1    | UpdateOneBench                      | benchMin                  | pipeline | 1000 | 1,347,008b | 1,279.157μs  | -1.00σ       | -6.21%         |
| 0    | UpdateOneBench                      | benchMax                  | operator | 1000 | 1,347,008b | 1,157.634μs  | -1.00σ       | -0.05%         |
| 1    | UpdateOneBench                      | benchMax                  | operator | 1000 | 1,347,008b | 1,158.749μs  | +1.00σ       | +0.05%         |
| 0    | UpdateOneBench                      | benchMax                  | pipeline | 1000 | 1,347,008b | 1,259.698μs  | +1.00σ       | +1.24%         |
| 1    | UpdateOneBench                      | benchMax                  | pipeline | 1000 | 1,347,008b | 1,228.821μs  | -1.00σ       | -1.24%         |
| 0    | UpdateOneBench                      | benchCurrentDate          | operator | 1000 | 1,347,016b | 1,147.984μs  | -1.00σ       | -4.84%         |
| 1    | UpdateOneBench                      | benchCurrentDate          | operator | 1000 | 1,347,016b | 1,264.770μs  | +1.00σ       | +4.84%         |
| 0    | UpdateOneBench                      | benchCurrentDate          | pipeline | 1000 | 1,347,016b | 1,232.524μs  | -1.00σ       | -9.05%         |
| 1    | UpdateOneBench                      | benchCurrentDate          | pipeline | 1000 | 1,347,016b | 1,477.666μs  | +1.00σ       | +9.05%         |
| 0    | UpdateOneArrayCombinedBench         | benchPushPull             | operator | 1000 | 1,330,896b | 4,092.642μs  | +1.00σ       | +5.37%         |
| 1    | UpdateOneArrayCombinedBench         | benchPushPull             | operator | 1000 | 1,330,896b | 3,675.493μs  | -1.00σ       | -5.37%         |
| 0    | UpdateOneArrayCombinedBench         | benchPushPull             | pipeline | 1000 | 1,330,896b | 3,258.913μs  | +1.00σ       | +10.59%        |
| 1    | UpdateOneArrayCombinedBench         | benchPushPull             | pipeline | 1000 | 1,330,896b | 2,634.536μs  | -1.00σ       | -10.59%        |
| 0    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | operator | 1000 | 1,330,904b | 3,038.568μs  | -1.00σ       | -8.98%         |
| 1    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | operator | 1000 | 1,330,904b | 3,638.404μs  | +1.00σ       | +8.98%         |
| 0    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | pipeline | 1000 | 1,330,904b | 2,298.060μs  | +1.00σ       | +3.35%         |
| 1    | UpdateOneArrayCombinedBench         | benchChangeAndPush        | pipeline | 1000 | 1,330,904b | 2,149.173μs  | -1.00σ       | -3.35%         |
| 0    | UpdateOneArrayBench                 | benchPush                 | operator | 1000 | 1,339,400b | 1,710.102μs  | +1.00σ       | +17.32%        |
| 1    | UpdateOneArrayBench                 | benchPush                 | operator | 1000 | 1,339,400b | 1,205.184μs  | -1.00σ       | -17.32%        |
| 0    | UpdateOneArrayBench                 | benchPush                 | pipeline | 1000 | 1,339,400b | 1,880.326μs  | +1.00σ       | +4.24%         |
| 1    | UpdateOneArrayBench                 | benchPush                 | pipeline | 1000 | 1,339,400b | 1,727.253μs  | -1.00σ       | -4.24%         |
| 0    | UpdateOneArrayBench                 | benchPop                  | operator | 1000 | 1,339,400b | 2,277.414μs  | -1.00σ       | -6.16%         |
| 1    | UpdateOneArrayBench                 | benchPop                  | operator | 1000 | 1,339,400b | 2,576.153μs  | +1.00σ       | +6.16%         |
| 0    | UpdateOneArrayBench                 | benchPop                  | pipeline | 1000 | 1,339,400b | 1,591.710μs  | -1.00σ       | -7.51%         |
| 1    | UpdateOneArrayBench                 | benchPop                  | pipeline | 1000 | 1,339,400b | 1,850.215μs  | +1.00σ       | +7.51%         |
| 0    | UpdateOneArrayBench                 | benchPull                 | operator | 1000 | 1,339,400b | 2,023.433μs  | -1.00σ       | -5.45%         |
| 1    | UpdateOneArrayBench                 | benchPull                 | operator | 1000 | 1,339,400b | 2,256.482μs  | +1.00σ       | +5.45%         |
| 0    | UpdateOneArrayBench                 | benchPull                 | pipeline | 1000 | 1,339,400b | 2,620.416μs  | +1.00σ       | +6.03%         |
| 1    | UpdateOneArrayBench                 | benchPull                 | pipeline | 1000 | 1,339,400b | 2,322.378μs  | -1.00σ       | -6.03%         |
| 0    | UpdateOneArrayBench                 | benchPullAll              | operator | 1000 | 1,339,400b | 1,759.943μs  | -1.00σ       | -3.64%         |
| 1    | UpdateOneArrayBench                 | benchPullAll              | operator | 1000 | 1,339,400b | 1,892.734μs  | +1.00σ       | +3.64%         |
| 0    | UpdateOneArrayBench                 | benchPullAll              | pipeline | 1000 | 1,339,400b | 2,196.432μs  | -1.00σ       | -3.46%         |
| 1    | UpdateOneArrayBench                 | benchPullAll              | pipeline | 1000 | 1,339,400b | 2,353.725μs  | +1.00σ       | +3.46%         |
| 0    | UpdateOneArrayBench                 | benchAddToSet             | operator | 1000 | 1,339,400b | 1,772.975μs  | -1.00σ       | -0.26%         |
| 1    | UpdateOneArrayBench                 | benchAddToSet             | operator | 1000 | 1,339,400b | 1,782.240μs  | +1.00σ       | +0.26%         |
| 0    | UpdateOneArrayBench                 | benchAddToSet             | pipeline | 1000 | 1,339,400b | 2,144.686μs  | +1.00σ       | +6.66%         |
| 1    | UpdateOneArrayBench                 | benchAddToSet             | pipeline | 1000 | 1,339,400b | 1,876.862μs  | -1.00σ       | -6.66%         |
| 0    | CallOverheadBench                   | benchHydrateDirectAccess  |          | 1000 | 779,624b   | 0.213μs      | +0.00σ       | +0.00%         |
| 0    | CallOverheadBench                   | benchHydrateMethod        |          | 1000 | 779,608b   | 0.355μs      | +0.00σ       | +0.00%         |

## Operator vs Pipeline

| benchmark                           | subject            | operator | pipeline | delta   |
| --- | --- | --- | --- | --- |
| UpdateOneEmbeddedArrayCombinedBench | benchSetPushPull   | 5.069ms  | 3.704ms  | -26.93% |
| MultiDocumentUpdateBench            | benchUpdate        | 22.322ms | 2.284ms  | -89.77% |
| UpdateOneBench                      | benchSet           | 1.025ms  | 1.182ms  | +15.33% |
| UpdateOneBench                      | benchSetMultiple   | 1.083ms  | 1.071ms  | -1.15%  |
| UpdateOneBench                      | benchInc           | 1.120ms  | 1.215ms  | +8.45%  |
| UpdateOneBench                      | benchMul           | 1.215ms  | 1.220ms  | +0.43%  |
| UpdateOneBench                      | benchMin           | 1.246ms  | 1.364ms  | +9.43%  |
| UpdateOneBench                      | benchMax           | 1.158ms  | 1.244ms  | +7.43%  |
| UpdateOneBench                      | benchCurrentDate   | 1.206ms  | 1.355ms  | +12.34% |
| UpdateOneArrayCombinedBench         | benchPushPull      | 3.884ms  | 2.947ms  | -24.13% |
| UpdateOneArrayCombinedBench         | benchChangeAndPush | 3.338ms  | 2.224ms  | -33.39% |
| UpdateOneArrayBench                 | benchPush          | 1.458ms  | 1.804ms  | +23.75% |
| UpdateOneArrayBench                 | benchPop           | 2.427ms  | 1.721ms  | -29.09% |
| UpdateOneArrayBench                 | benchPull          | 2.140ms  | 2.471ms  | +15.47% |
| UpdateOneArrayBench                 | benchPullAll       | 1.826ms  | 2.275ms  | +24.57% |
| UpdateOneArrayBench                 | benchAddToSet      | 1.778ms  | 2.011ms  | +13.10% |
