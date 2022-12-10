<?php

/**
 * @class SearchAlgorithm
 */
abstract class SearchAlgorithm
{
    /**
     * Text was not found
     */
    private const TEXT_NOT_FOUND = 'Searched text was not found!';

    /**
     * Text was found
     */
    private const TEXT_FOUND = 'Searched text starts at position #';

    /**
     * Haystack text length
     *
     * @var int
     */
    protected int $hLength;

    /**
     * Needle text length
     *
     * @var int
     */
    protected int $nLength;

    /**
     * Search for $needle in $haystack
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool|int
     */
    abstract public function search(string $haystack, string $needle): bool|int;

    /**
     * Search for text and return a message
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return string
     */
    public function searchWithOutput(string $haystack, string $needle): string
    {
        $result = $this->search($haystack, $needle);

        if ($result === false) {
            return self::TEXT_NOT_FOUND;
        }

        return self::TEXT_FOUND . $result;
    }

    /**
     * Pre-check string length
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool
     */
    protected function passBasicCheck(string $haystack, string $needle): bool
    {
        if (
            ($this->nLength = strlen($needle)) > ($this->hLength = strlen($haystack))
            || $this->hLength === 0
            || $this->nLength === 0
        ) {
            return false;
        }

        if ($this->nLength === $this->hLength && $needle[0] !== $haystack[0]) {
            return false;
        }

        return true;
    }
}
