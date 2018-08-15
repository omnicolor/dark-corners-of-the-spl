<?php
/**
 * Simple performance test for SplHeap.
 * Run with 'php SplHeapTest.php > /dev/null'
 */

// Try with one million elements.
$numItems = 1000000;

$startTime = microtime(true);
$startSize = memory_get_usage();
$array = [];
for ($i = 0; $i < $numItems; $i++) {
    array_push($array, mt_rand());
}
$peakSize = memory_get_usage();
rsort($array);

foreach ($array as $value) {
    echo $value, ' ';
}

echo PHP_EOL;
unset($array);
fwrite(
    STDERR,
    'Array: ' . (microtime(true) - $startTime) . ' seconds '
    . round(($peakSize - $startSize) / 1024 / 1024) . 'MiB ' . PHP_EOL
);

class MaxHeap extends SplMaxHeap {
    public function compare($a, $b) : int {
        return $a - $b;
    }
}

$startTime = microtime(true);
$startSize = memory_get_usage();
$heap = new MaxHeap();
for ($i = 0; $i < $numItems; $i++) {
    $heap->insert(mt_rand());
}
$peakSize = memory_get_usage();

foreach ($heap as $value) {
    echo $value, ' ';
}

echo PHP_EOL;
unset($heap);
fwrite(
    STDERR,
    'Heap: ' . (microtime(true) - $startTime) . ' seconds '
    . round(($peakSize - $startSize) / 1024 / 1024) . 'MiB ' . PHP_EOL
);
