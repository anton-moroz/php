<?php

/**
 * @class BoyerMooreSearch
 *
 * Complexity - O(n+m), n = $hLength, m = $nLength
 * Worst case - O(n*m)
 */
class BoyerMooreSearch extends SearchAlgorithm
{
    /**
     * "Partial match" table
     *
     * @var array
     */
    private array $table = [];

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

        for ($i = $this->nLength - 1; $i < $this->hLength;) {
            for ($j = $this->nLength - 1, $k = $i; $haystack[$k] === $needle[$j]; $j--, $k--) {
                if ($j === 0) {
                    return $k;
                }
            }

            $i += $this->getFromTable($haystack[$i]);
        }

        return false;
    }

    /**
     * Build "partial match" table
     *
     * @param $needle
     *
     * @return void
     */
    private function buildTable($needle): void
    {
        for ($i = 0; $i < $this->nLength; $i++) {
            $this->table[$needle[$i]] = $this->nLength - $i - 1;
        }
    }

    /**
     * Get shift for a char from table or $nLength if there is no such
     *
     * @param string $char
     *
     * @return int
     */
    private function getFromTable(string $char): int
    {
        return (array_key_exists($char, $this->table))
            ? max($this->table[$char], 1)
            : $this->nLength;
    }
}
