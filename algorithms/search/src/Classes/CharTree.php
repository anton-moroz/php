<?php

/**
 * @CharTree
 *
 * Tree that chars that makes words.
 * "." char is used to symbolize the end of word in the tree.
 * Contains functions to build tree with word iterators and search for words.
 */
class CharTree
{
    /**
     * @var CharTreeNode
     */
    private CharTreeNode $node;

    /**
     * @param string $alphabet   Alphabet used in text
     * @param string $additional Additional chars, that can be used in words. The word can't start or end with these chars.
     */
    public function __construct(private readonly string $alphabet, private readonly string $additional)
    {
        $this->node = new CharTreeNode();
    }

    /**
     * Read words from files and build tree.
     *
     * @param string $filePath
     *
     * @return void
     */
    public function buildFromFile(string $filePath): void
    {
        $this->build(new WordFileIterator($filePath, $this->alphabet, $this->additional));
    }

    /**
     * Iterate words and build tree.
     *
     * @param Iterator $wordIterator
     *
     * @return void
     */
    protected function build(Iterator $wordIterator): void
    {
        foreach ($wordIterator as $word) {
            $this->add($word);
        }
    }

    /**
     * Add word to the tree.
     *
     * @param string $word
     *
     * @return void
     */
    private function add(string $word): void
    {
        $this->node->add(strtolower("$word."));
    }

    /**
     * Check if the tree contains the word.
     *
     * @param string $word
     *
     * @return bool
     */
    public function hasWord(string $word): bool
    {
        return $this->node->has(strtolower("$word."));
    }
}
