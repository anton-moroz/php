<?php

include 'autoloader.php';

$algorithms = [
    LinearSearch::class,
    KMPSearch::class,
    BoyerMooreSearch::class,
];

$text = file_get_contents('text.txt');

foreach ($algorithms as $algorithm) {
    $algorithm = new $algorithm;

    echo PHP_EOL . get_class($algorithm) . PHP_EOL;
    echo $algorithm->searchWithOutput('abcafdfabcabd', 'abcabd') . PHP_EOL;
    echo $algorithm->searchWithOutput('abcabcabd', 'abcabd') . PHP_EOL;
    echo $algorithm->searchWithOutput('abcabcaba', '') . PHP_EOL;
    echo $algorithm->searchWithOutput('', 'abcabd') . PHP_EOL;
    echo $algorithm->searchWithOutput('', '') . PHP_EOL;
    echo $algorithm->searchWithOutput($text, 'tellus') . PHP_EOL;
    echo $algorithm->searchWithOutput($text, 'parturient montes nascetur') . PHP_EOL;
    echo $algorithm->searchWithOutput($text, 'vulputate') . PHP_EOL;
    echo $algorithm->searchWithOutput($text, 'nulla') . PHP_EOL;
}
