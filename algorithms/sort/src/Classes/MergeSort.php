<?php

/**
 * @class MergeSort
 *
 * Time Complexity - O(n*log n)
 * Best - O(n*log n)
 * Worst - O(n*log n)
 *
 * Space Complexity - O(n)
 */
class MergeSort extends SortAlgorithm
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
        $size = count($array);

        if ($size >= 2) {
            [$left, $right] = array_chunk($array, ceil($size / 2));
            $left  = $this->sort($left);
            $right = $this->sort($right);
            $i     = $j = $k = 0;

            while ($i < count($left) && $j < count($right)) {
                if ($left[$i] < $right[$j]) {
                    $array[$k] = $left[$i];
                    $i++;
                } else {
                    $array[$k] = $right[$j];
                    $j++;
                }

                $k++;
            }

            while ($i < count($left)) {
                $array[$k] = $left[$i];
                $i++;
                $k++;
            }

            while ($j < count($right)) {
                $array[$k] = $right[$j];
                $j++;
                $k++;
            }
        }

        return $array;
    }
}
