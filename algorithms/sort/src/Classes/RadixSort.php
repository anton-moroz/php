<?php

/**
 * @class RadixSort
 *
 * Time Complexity - O(n+k)
 * Best - O(n+k)
 * Worst - O(n+k)
 *
 * Space Complexity - O(max)
 */
class RadixSort extends SortAlgorithm
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
        $max   = $array[0];
        $place = 1;

        while ((int)($max / $place) > 0) {
            $array = $this->countingSort($array, $place);
            $place *= 10;
        }

        return $array;
    }

    /**
     * Counting sort for specific digit
     *
     * @param array $array
     * @param int   $place
     *
     * @return array
     */
    public function countingSort(array $array, int $place): array
    {
        $size   = count($array);
        $output = array_fill(0, $size, 0);
        $count  = array_fill(0, $size, 0);

        foreach ($array as $iValue) {
            $index = (int)($iValue / $place);
            $count[$index % 10]++;
        }

        for ($i = 1; $i < $size; $i++) {
            $count[$i] += $count[$i - 1];
        }

        $i = $size - 1;

        while ($i >= 0) {
            $index                           = (int)($array[$i] / $place);
            $output[$count[$index % 10] - 1] = $array[$i];
            $count[$index % 10]--;
            $i--;
        }

        for ($i = 0; $i < $size; $i++) {
            $array[$i] = $output[$i];
        }

        return $array;
    }
}
