<?php

/**
 * @class SelectionSort
 *
 * Time Complexity - O(n^2)
 * Best - O(n^2)
 * Worst - O(n^2)
 *
 * Space Complexity - O(1)
 */
class SelectionSort extends SortAlgorithm
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
        for ($i = 0, $iMax = count($array); $i < $iMax; $i++) {
            $minIndex = $i;

            for ($j = $i + 1; $j < $iMax; $j++) {
                if ($array[$j] < $array[$minIndex]) {
                    $minIndex = $j;
                }
            }

            [$array[$i], $array[$minIndex]] = [$array[$minIndex], $array[$i]];
        }

        return $array;
    }
}
