<?php

include 'autoloader.php';

$cLine           = new UserInteraction();
$alphabet        = 'abcdefghijklmnopqrstuvwxyz';
$additionalChars = '\'-';

do {
    $file = $cLine->ask('Enter path to file with text where to search for a word and press Enter');

    if (!file_exists($file) && !$cLine->askFor('Could not open this file. Type y/Y if you want to try again:', ['y'])) {
        $cLine->write('Exiting...');

        exit;
    }
} while (!file_exists($file));

$cLine->write('Started reading text from file.');
$charTree = new CharTree($alphabet, $additionalChars);
$charTree->buildFromFile($file);
$cLine->write('Text was read from file.');

while (true) {
    $cLine->write();
    $word = $cLine->ask('Type a word you want to find in text:');
    $cLine->write("Word $word was " . ($charTree->hasWord($word) ? '' : 'not ') . "found");

    if (!$cLine->askFor('Type y/Y if you want to find another word: ', ['y'])) {
        $cLine->write('Exiting...');

        exit;
    }
}
