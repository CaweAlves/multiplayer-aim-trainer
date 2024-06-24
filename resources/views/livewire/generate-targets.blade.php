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
                    x-bind:style="`left: ${target.x}%; top: ${target.y}%; width: ${target.size}px; height: ${target.size}px; border-radius: 50%;`"
                    wire:click="removeTarget(index)"
                    class="absolute target-enter"
                >
                <svg class="w-full" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#d41616"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#cb1010;} </style> <g> <path class="st0" d="M256.008,0.008C114.849,0.008,0,114.833,0,256c0,141.158,114.849,255.992,256.008,255.992 C397.16,511.992,512,397.159,512,256C512,114.833,397.16,0.008,256.008,0.008z M256.008,460.794 c-112.921,0-204.802-91.881-204.802-204.794c0-112.912,91.88-204.802,204.802-204.802c112.92,0,204.786,91.89,204.786,204.802 C460.794,368.913,368.928,460.794,256.008,460.794z"></path> <path class="st0" d="M256.008,102.397c-84.698,0-153.612,68.905-153.612,153.603c0,84.69,68.913,153.587,153.612,153.587 c84.683,0,153.595-68.896,153.595-153.587C409.603,171.302,340.691,102.397,256.008,102.397z M256.008,358.405 c-56.468,0-102.405-45.937-102.405-102.405c0-56.452,45.937-102.405,102.405-102.405c56.46,0,102.388,45.952,102.388,102.405 C358.397,312.469,312.468,358.405,256.008,358.405z"></path> <path class="st0" d="M256.008,204.809c-28.287,0-51.215,22.92-51.215,51.191c0,28.271,22.928,51.19,51.215,51.19 c28.279,0,51.198-22.92,51.198-51.19C307.207,227.73,284.287,204.809,256.008,204.809z"></path> </g> </g></svg>
            </div>
            </template>
        </div>
    </div>
