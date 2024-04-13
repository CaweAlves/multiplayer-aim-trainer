<?php

use Livewire\Volt\Component;

new class extends Component {
    public array $circles = [];

    public function mount()
    {
        $this->generateCircles();
    }

    public function generateCircles()
    {
        foreach (range(1, 10) as $i) {
            $this->circles[] = [
                'x' => rand(0, 100),
                'y' => rand(0, 100),
                'size' => rand(10, 150),
            ];
        }
    }

    public function clickCircle($index)
    {
        unset($this->circles[$index]);
    }
}; ?>

<div class="text-center text-8xl">
    Trainer

    <div wire:init="generateCircles" data-circles="{{ json_encode($circles) }}">
        <div x-data="{ circles: @entangle('circles') }">
            <template x-for="(circle, index) in circles" :key="index">
                <div
                    x-bind:style="`left: ${circle.x}%; top: ${circle.y}%; width: ${circle.size}px; height: ${circle.size}px; border-radius: 50%; background-color: red;`"
                    class="absolute"
                    wire:click="clickCircle(index)"
                ></div>
            </template>
        </div>
    </div>
</div>

</div>
