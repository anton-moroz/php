<?php

/**
 * @class QuickSort
 *
 * Time Complexity - O(n*log n)
 * Best - O(n*log n)
 * Worst - O(n^2)
 *
 * Space Complexity - O(log n)
 */
class QuickSort extends SortAlgorithm
{
    /**
     * Array to sort
     *
     * @var array
     */
    private array $array = [];

    /**
     * @inheritdoc
     *
     * @param array $array
     *
     * @return array
     */
    public function sort(array $array): array
    {
        $this->array = $array;
        $this->qSort(0, count($array) - 1);

        return $this->array;
    }

    /**
     * Quick sort implementation
     *
     * @param $left
     * @param $right
     *
     * @return void
     */
    private function qSort($left, $right): void
    {
        if ($left < $right) {
            $pivot = $this->partition($left, $right);
            $this->qSort($left, $pivot - 1);
            $this->qSort($pivot, $right);
        }
    }

    /**
     * Find and return partition position
     *
     * @param $left
     * @param $right
     *
     * @return int
     */
    private function partition($left, $right): int
    {
        $pivot      = floor($left + ($right - $left) / 2);
        $pivotValue = $this->array[$pivot];

        while ($left <= $right) {
            while (($this->array[$left] < $pivotValue)) {
                $left++;
            }

            while (($this->array[$right] > $pivotValue)) {
                $right--;
            }

            if ($left <= $right) {
                [$this->array[$left], $this->array[$right]] = [$this->array[$right], $this->array[$left]];
                $left++;
                $right--;
            }
        }

        return $left;
    }
}
