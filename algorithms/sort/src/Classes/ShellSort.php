<?php

/**
 * @class ShellSort
 *
 * Time Complexity - O(n*log n)
 * Best - O(n*log n)
 * Worst - O(n^2)
 *
 * Space Complexity - O(1)
 *
 * Is not a stable algorithm as it doesn't check
 * Elements between intervals.
 */
class ShellSort extends SortAlgorithm
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
        $size     = count($array);
        $interval = (int)($size / 2);

        while ($interval > 0) {
            for ($i = $interval; $i < $size; $i++) {
                $temp = $array[$i];
                $j    = $i;

                while ($j >= $interval && $array[$j - $interval] > $temp) {
                    $array[$j] = $array[$j - $interval];
                    $j         -= $interval;
                }

                $array[$j] = $temp;
            }

            $interval = (int)($interval / 2);
        }

        return $array;
    }
}
