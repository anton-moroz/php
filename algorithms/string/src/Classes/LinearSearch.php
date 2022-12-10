<?php

/**
 * @class LinearSearch
 *
 * Complexity - O(n+m), n = $hLength, m = $nLength
 * Worst case - O(n*m)
 */
class LinearSearch extends SearchAlgorithm
{
    /**
     * @inheritdoc
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool|int
     */
    public function search(string $haystack, string $needle): bool|int
    {
        if (!$this->passBasicCheck($haystack, $needle)) {
            return false;
        }

        $nIndex = 0;

        for ($hIndex = 0; $hIndex < $this->hLength; $hIndex++) {
            while (($hIndex + $nIndex) < $this->hLength && $haystack[$hIndex + $nIndex] === $needle[$nIndex]) {
                if ($nIndex + 1 === $this->nLength) {
                    return $hIndex;
                }

                $nIndex++;
            }

            $nIndex = 0;
        }

        return false;
    }
}
