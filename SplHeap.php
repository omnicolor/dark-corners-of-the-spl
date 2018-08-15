<?php
class Character {
    public $name;
    public $initiative;
    public function __construct(string $name, int $init) {
        $this->name = $name;
        $this->initiative = $init;
    }
}

class InitiativeHeap extends SplMaxHeap {
    public function compare($a, $b) : int {
        return $a->initiative - $b->initiative;
    }
}

$init = new InitiativeHeap();
$init->insert(new Character('Ash', random_int(1, 30)));
$init->insert(new Character('Bingo', random_int(1, 30)));
$init->insert(new Character('Charlie', random_int(1, 30)));
$init->insert(new Character('Echo', random_int(1, 30)));

foreach ($init as $character) {
    echo sprintf('%s %d', $character->name, $character->initiative), PHP_EOL;
}
