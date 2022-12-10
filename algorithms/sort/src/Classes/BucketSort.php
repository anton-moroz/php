<?php

/**
 * @class BucketSort
 *
 * Time Complexity - O(n)
 * Best - O(n+k)
 * Worst - O(n^2)
 *
 * Space Complexity - O(n+k)
 */
class BucketSort extends SortAlgorithm
{
    /**
     * @inheritdoc
     *
     * @param array $array
     *
     * @return array
     */
    public function sort(array $array): array
    {
        $bucket = [];
        $max = 0;

        foreach ($array as $item) {
            $max = $max < $item ? $item : $max;
            $bucket[$item][] = $item;
        }

        $array = [];

        for($i = 0; $i <= $max; $i++) {
            $array = isset($bucket[$i]) ? [...$array, ...$bucket[$i]] : $array;
        }

        return $array;
    }
}
