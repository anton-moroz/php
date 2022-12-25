<?php

/**
 * @UserInteraction
 * Class for console interaction with user.
 */
class UserInteraction
{
    /**
     * Write text to console and go to new line.
     *
     * @param string $text
     *
     * @return void
     */
    public function write(string $text = ''): void
    {
        echo $text . PHP_EOL;
    }

    /**
     * Read user's input from console.
     *
     * @return bool|string
     */
    public function read(): bool|string
    {
        return str_replace(PHP_EOL, '', fgets(fopen('php://stdin', 'rb')));
    }

    /**
     * Write text to console and get user's input.
     *
     * @param string $text
     *
     * @return bool|string
     */
    public function ask(string $text): bool|string
    {
        $this->write($text);

        return $this->read();
    }

    /**
     * Write text to console and check if user selected proper option.
     *
     * @param string $text
     * @param array  $matches
     * @param bool   $caseSensitive
     *
     * @return bool
     */
    public function askFor(string $text, array $matches, bool $caseSensitive = false): bool
    {
        $response = $this->ask($text);

        if($caseSensitive) {
            if (in_array($response, $matches, true)) {
                return true;
            }
        } else {
            foreach ($matches as $match) {
                if (strtoupper($match) === strtoupper($response)) {
                    return true;
                }
            }
        }

        return false;
    }
}
