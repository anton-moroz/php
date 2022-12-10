<?php

/**
 * @class HeapSort
 *
 * Time Complexity - O(n*log n)
 * Best - O(n*log n)
 * Worst - O(n*log n)
 *
 * Space Complexity - O(1)
 */
class HeapSort extends SortAlgorithm
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

        for ($i = (int)($size / 2); $i > -1; $i--) {
            $this->heapify($array, $size, $i);
        }

        for ($i = $size - 1; $i > 0; $i--) {
            [$array[$i], $array[0]] = [$array[0], $array[$i]];
            $this->heapify($array, $i, 0);
        }

        return $array;
    }

    /**
     * @param array $array
     * @param int   $n
     * @param int   $i
     *
     * @return void
     */
    private function heapify(array &$array, int $n, int $i): void
    {
        $largest = $i;
        $l       = 2 * $i + 1;
        $r       = 2 * $i + 2;

        if ($l < $n && $array[$i] < $array[$l]) {
            $largest = $l;
        }

        if ($r < $n && $array[$largest] < $array[$r]) {
            $largest = $r;
        }

        if ($largest !== $i) {
            [$array[$i], $array[$largest]] = [$array[$largest], $array[$i]];
            $this->heapify($array, $n, $largest);
        }
    }
}
