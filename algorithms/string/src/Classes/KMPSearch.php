<?php

/**
 * @class KMPSearch
 *
 * Complexity - O(n+m), n = $hLength, m = $nLength
 * Worst case - O(n+m)
 */
class KMPSearch extends SearchAlgorithm
{
    /**
     * "Partial match" table
     *
     * @var array|int[]
     */
    private array $table = [0 => 0];

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

        $this->buildTable($needle);

        for ($i = 0, $j = 0; $i < $this->hLength; $i++) {
            while ($j > 0 && $needle[$j] !== $haystack[$i]) {
                $j = $this->table[$j - 1];
            }

            if ($needle[$j] === $haystack[$i]) {
                $j++;
            }

            if ($j === $this->nLength) {
                return $i - $j + 1;
            }
        }

        return false;
    }

    /**
     * Build "partial match" table
     *
     * @param string $needle
     *
     * @return void
     */
    private function buildTable(string $needle): void
    {
        for ($i = 1, $j = 0; $i < $this->nLength; $i++) {
            while ($j > 0 && $needle[$j] !== $needle[$i]) {
                $j = $this->table[$j - 1];
            }

            if ($needle[$j] === $needle[$i]) {
                $j++;
            }

            $this->table[$i] = $j;
        }
    }
}
