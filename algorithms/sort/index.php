<?php

include 'autoloader.php';

ini_set('memory_limit', '28000M');

$sort_array_sizes = [10, 100, 1000, 10000, 100000];
$algorithms       = [
    ShellSort::class,
    BubbleSort::class,
    OptimizedBubbleSort::class,
    SelectionSort::class,
    InsertionSort::class,
    MergeSort::class,
    QuickSort::class,
    CountingSort::class,
    RadixSort::class,
    HeapSort::class,
    BucketSort::class,
];

foreach ($sort_array_sizes as $size) {
    for ($i = 0; $i < 10; $i++) {
        $arrayToSort = getIntArray($size, max: $size * 10);

        foreach ($algorithms as $algorithm) {
            $algorithm = new $algorithm;
            echo get_class($algorithm) . PHP_EOL;
            echo $algorithm->sortWithOutput($arrayToSort);
        }
    }
}

function getIntArray(int $size, $min = 0, $max = PHP_INT_MAX): array
{
    $array = [];

    for ($i = 0; $i < $size; $i++) {
        $array[] = rand($min, $max);
    }

    return $array;
}
