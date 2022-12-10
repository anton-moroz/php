<?php

/**
 * @class CountingSort
 *
 * Time Complexity - O(n+k)
 * Best - O(n+k)
 * Worst - O(n+k)
 *
 * Space Complexity - O(max)
 */
class CountingSort extends SortAlgorithm
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
        $max    = $array[0];
        $size   = count($array);
        $output = [];

        foreach ($array as $item) {
            if ($item > $max) {
                $max = $item;
            }
        }

        $count = array_fill(0, $max + 1, 0);

        foreach ($array as $item) {
            ++$count[$item];
        }

        for ($i = 1; $i <= $max; $i++) {
            $count[$i] += $count[$i - 1];
        }

        for ($i = $size - 1; $i >= 0; $i--) {
            $output[$count[$array[$i]] - 1] = $array[$i];
            $count[$array[$i]]--;
        }

        for ($i = 0; $i < $size; $i++) {
            $array[$i] = $output[$i];
        }

        return $array;
    }
}
