<?php

/**
 * @class SortAlgorithm
 */
abstract class SortAlgorithm
{
    /**
     * How much time was spent for sorting
     */
    private const TIME_MESSAGE = "Sorting %d elements array took: %s\n";

    /**
     * Sort array
     *
     * @param array $array
     *
     * @return array
     */
    abstract public function sort(array $array): array;

    /**
     * Sort array and get message
     *
     * @param array $array
     *
     * @return string
     */
    public function sortWithOutput(array $array): string
    {
        $start = $this->getNow();
        $this->sort($array);
        $time = $start->diff($this->getNow());

        return sprintf(self::TIME_MESSAGE, count($array), $this->formatTime($time));
    }

    /**
     * Get current timestamp
     *
     * @return DateTime
     */
    private function getNow(): DateTime
    {
        return new DateTime();
    }

    /**
     * Return string with used time
     *
     * @param DateInterval $dateInterval
     *
     * @return string
     */
    private function formatTime(DateInterval $dateInterval): string
    {
        $time = '';

        if (($hours = $dateInterval->format('%h')) !== '0') {
            $time .= "{$hours}h, ";
        }

        if (($minutes = $dateInterval->format('%m')) !== '0') {
            $time .= "{$minutes}m, ";
        }

        if (($seconds = $dateInterval->format('%s')) !== '0') {
            $time .= "{$seconds}s, ";
        }

        if (($mSeconds = $dateInterval->format('%F')) !== '0') {
            $time .= "{$mSeconds}ms";
        }

        return $time;
    }
}
