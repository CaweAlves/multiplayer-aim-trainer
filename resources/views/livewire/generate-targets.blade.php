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
    $maxTargets = max(1, (int) $intervals);

    foreach (range(1, rand(1, $maxTargets)) as $i) {
        $this->targets[] = [
            'x'    => rand(0, 90),
            'y'    => rand(0, 80),
            'size' => rand(10, 50),
        ];
    }
};

$removeTarget = function ($target) {
    unset($this->targets[$target]);
};

?>

<div wire:poll="generate" wire:init="generate" data-targets="{{ json_encode($targets) }}">
        <div x-data="{ targets: @entangle('targets').live }">
            <template x-for="(target, index) in targets" :key="index">
                <div
                    x-bind:style="`left: ${target.x}%; top: ${target.y}%; width: ${target.size}px; height: ${target.size}px; border-radius: 50%; background-color: red;`"
                    wire:click="removeTarget(index)"
                    class="absolute target-enter"
                ></div>
            </template>
        </div>
    </div>
