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
        foreach (range(1, 1) as $i) {
            $this->circles[] = [
                'x' => rand(0, 90),
                'y' => rand(0, 80),
                'size' => rand(10, 150),
            ];
        }
    }

    public function clickCircle($index)
    {
        $this->circles[$index]['class'] = 'circle-exit';
        $this->dispatch('circleRemoved', ['index' => $index]);
    }
}; ?>
<div class="text-center text-8xl">
    Trainer

    <div wire:poll="generateCircles" wire:init="generateCircles" data-circles="{{ json_encode($circles) }}">
        <div x-data="{ circles: @entangle('circles') }" @circleRemoved.window="removeCircle($event.detail.index)">
            <template x-for="(circle, index) in circles" :key="index">
                <div
                    x-bind:style="`left: ${circle.x}%; top: ${circle.y}%; width: ${circle.size}px; height: ${circle.size}px; border-radius: 50%; background-color: red;`"
                    :class="circle.class"
                    x-bind:class="{ 'circle-exit': circle.class === 'circle-exit' }"
                    wire:click="clickCircle(index)"
                    class="absolute"
                ></div>
            </template>
        </div>
    </div>
</div>

</div>
