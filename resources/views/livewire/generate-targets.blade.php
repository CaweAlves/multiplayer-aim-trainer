<?php

use function Livewire\Volt\{state};

state(['targets' => []]);

$generate = function () {
    foreach (range(1, rand(1, 1)) as $i) {
        $this->targets[] = [
            'x' => rand(0, 90),
            'y' => rand(0, 80),
            'size' => rand(10, 50),
        ];
    }
}

?>

<div>
    //
</div>
