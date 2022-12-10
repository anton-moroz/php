<?php

/**
 * @class BubbleSort
 *
 * Time Complexity - O(n^2)
 * Best - O(n)
 * Worst - O(n^2)
 *
 * Space Complexity - O(1)
 */
class BubbleSort extends SortAlgorithm
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
        for ($j = 0, $size = count($array); $j < $size; $j++) {
            for ($i = 0; $i < $size - 1; $i++) {
                if ($array[$i] > $array[$i + 1]) {
                    [$array[$i], $array[$i + 1]] = [$array[$i + 1], $array[$i]];
                }
            }
        }

        return $array;
    }
}
