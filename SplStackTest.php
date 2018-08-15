<?php
/**
 * Simple performance test for a stack made from an array vs SplStack.
 * Run with 'php SplStackTest.php > /dev/null'
 */

// Try with one million elements.
$numItems = 1000000;

$startTime = microtime(true);
$startSize = memory_get_usage();
$arrayStack = [];
for ($i = 0; $i < $numItems; $i++) {
    array_push($arrayStack, mt_rand());
}
$peakSize = memory_get_usage();

while (!empty($arrayStack)) {
    echo array_pop($arrayStack), ' ';
}

echo PHP_EOL;
unset($arrayStack);
fwrite(
    STDERR,
    'Array: ' . (microtime(true) - $startTime) . ' seconds '
    . round(($peakSize - $startSize) / 1024 / 1024) . 'MiB ' . PHP_EOL
);


$startTime = microtime(true);
$startSize = memory_get_usage();
$stack = new SplStack();
for ($i = 0; $i < $numItems; $i++) {
    $stack->push(mt_rand());
}
$peakSize = memory_get_usage();

while (!$stack->isEmpty()) {
    echo $stack->pop(), ' ';
}

echo PHP_EOL;
unset($stack);
fwrite(
    STDERR,
    'Stack: ' . (microtime(true) - $startTime) . ' seconds '
    . round(($peakSize - $startSize) / 1024 / 1024) . 'MiB ' . PHP_EOL
);
