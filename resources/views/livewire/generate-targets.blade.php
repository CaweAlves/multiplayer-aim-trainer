<?php

use Carbon\Carbon;

use function Livewire\Volt\{state};

state([
    'targets'           => [],
    'trainingStartDate' => new Carbon(),
]);

$generate = function () {
    $seconds    = (int) $this->trainingStartDate->diffInSeconds(now());
    $intervals  = $seconds / 10;
    $maxCircles = max(1, (int) $intervals);

    foreach (range(1, $maxCircles) as $i) {
        $this->targets[] = [
            'x'    => rand(0, 90),
            'y'    => rand(0, 80),
            'size' => rand(10, 50),
        ];
    }
}

?>

<div>
    //
</div>
