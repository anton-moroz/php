<?php

/**
 * @class OptimizedBubbleSort
 *
 * Time Complexity - O(n^2)
 * Best - O(n)
 * Worst - O(n^2)
 *
 * Space Complexity - O(2)
 */
class OptimizedBubbleSort extends SortAlgorithm
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
        for ($j = 0, $jMax = count($array); $j < $jMax; $j++) {
            $exit = true;

            for ($i = 0, $iMax = $jMax - 1; $i < $iMax; $i++) {
                if ($array[$i] > $array[$i + 1]) {
                    [$array[$i], $array[$i + 1]] = [$array[$i + 1], $array[$i]];
                    $exit = false;
                }
            }

            if ($exit) {
                break;
            }
        }

        return $array;
    }
}
