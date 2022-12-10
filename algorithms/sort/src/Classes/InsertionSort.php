<?php

/**
 * @class InsertionSort
 *
 * Time Complexity - O(n^2)
 * Best - O(n)
 * Worst - O(n^2)
 *
 * Space Complexity - O(1)
 */
class InsertionSort extends SortAlgorithm
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
        for ($j = 1, $jMax = count($array); $j < $jMax; $j++) {
            $elem = $array[$j];
            $i    = $j - 1;

            while ($i >= 0 && $elem < $array[$i]) {
                $array[$i + 1] = $array[$i];
                $i--;
            }

            $array[$i + 1] = $elem;
        }

        return $array;
    }
}
