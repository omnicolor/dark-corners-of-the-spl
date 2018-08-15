<?php

$list = new SplDoublyLinkedList();
$list->push('Ash');
$list->push('Bingo');
$list->push('Charlie');
$list->push('Echo');

foreach ($list as $key => $character) {
	echo $key, ' ', $character, PHP_EOL;
}
echo PHP_EOL;

$list->add(3, 'Delta');

foreach ($list as $key => $character) {
	echo $key, ' ', $character, PHP_EOL;
}
echo PHP_EOL;

$list->rewind();
echo sprintf(
    "It's %s's turn! They take out %s!",
    $list->current(),
    $list[2]
), PHP_EOL;
$list->offsetUnset(2);

foreach ($list as $key => $character) {
	echo $key, ' ', $character, PHP_EOL;
}
echo PHP_EOL;
