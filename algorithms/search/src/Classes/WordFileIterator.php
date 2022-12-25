<?php

/**
 * @WordFileIterator
 * Iterates word from file.
 */
class WordFileIterator implements Iterator
{
    /**
     * @var int
     */
    private int $index = 0;

    /**
     * @var string
     */
    private string $word;

    /**
     * @var SplFileObject
     */
    private SplFileObject $file;

    /**
     * @param string $filePath
     * @param string $alphabet
     * @param        $additional
     */
    public function __construct(
        string $filePath,
        private readonly string $alphabet,
        private $additional
    ) {
        $this->file = new SplFileObject($filePath);
    }

    /**
     * Get word.
     *
     * @return string
     */
    public function current(): string
    {
        return $this->word;
    }

    /**
     * Read next word from file.
     *
     * @return void
     */
    public function next(): void
    {
        $started        = false;
        $additionalChar = '';

        while (true) {
            if ($this->file->eof()) {
                if (!$started) {
                    $this->word = '';

                    return;
                }

                break;
            }

            $char           = $this->file->fgetc();
            $lower          = strtolower($char);
            $isFromAlphabet = str_contains($this->alphabet, $lower);

            if (!$started) {
                if (!$isFromAlphabet) {
                    continue;
                }

                $word    = $char;
                $started = true;
            } else {
                $isFromAdditional = str_contains($this->additional, $lower);

                if ($isFromAdditional) {
                    $additionalChar .= $char;

                    continue;
                }

                if ($isFromAlphabet) {
                    $word           .= "$additionalChar$char";
                    $additionalChar = '';
                } else {
                    break;
                }
            }
        }

        $this->word = $word;
        $this->index++;
    }

    /**
     * Get number of current word.
     *
     * @return int
     */
    public function key(): int
    {
        return $this->index;
    }

    /**
     * Check if that's a word, but not an empty string.
     *
     * @return bool
     */
    public function valid(): bool
    {
        return $this->word !== '';
    }

    /**
     * Start iteration from the beginning.
     *
     * @return void
     */
    public function rewind(): void
    {
        $this->file->rewind();
        $this->next();
        $this->index = 0;
    }
}
