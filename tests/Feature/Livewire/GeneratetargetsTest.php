<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('generate-targets');

    $component->assertSee('');
});

it('be able generate targets', function () {
    $component = Volt::test('generate-targets');

    $component->call('generate');
    $targets = $component->get('targets');

    expect(count($targets))->toBe(1);
});