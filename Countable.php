<?php

// Renamed to not clash with the real thing.
interface Countablez {
    public function count() : int;
}

// Class has the required method, but doesn't declare that it implements
// Countable.
class NotCountable {
    public function count() : int {
        return 42;
    }
}

$foo = new NotCountable();
echo count($foo), PHP_EOL;

// Class that always has 42 items.
Class ActuallyCountable implements Countable {
    public function count() {
        return 42;
    }
}

$bar = new ActuallyCountable();
echo count($bar), PHP_EOL;
