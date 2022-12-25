<?php

/**
 * @CharTreeNode
 * Char tree node, that uses char as key to get needed child node.
 */
class CharTreeNode
{
    /**
     * Array of nodes. Format is [char => childNode, '.' => null].
     *
     * @var array
     */
    private array $nodes = [];

    /**
     * Adds char as key. If char is not '.' there will be child node, else null will be used as value.
     *
     * @param string $chars
     *
     * @return void
     */
    public function add(string $chars): void
    {
        if (strlen($chars) > 1) {
            if (!isset($this->nodes[$chars[0]])) {
                $this->nodes[$chars[0]] ??= new self();
            }

            $this->nodes[$chars[0]]->add(substr($chars, 1));
        }

        $this->nodes[$chars[0]] = null;
    }

    /**
     * Check if there is node for a char
     *
     * @param string $chars
     *
     * @return bool
     */
    public function has(string $chars): bool
    {
        if (strlen($chars) > 1) {
            return isset($this->nodes[$chars[0]]) ? $this->nodes[$chars[0]]->has(substr($chars, 1)) : false;
        }

        return array_key_exists($chars, $this->nodes);
    }
}
