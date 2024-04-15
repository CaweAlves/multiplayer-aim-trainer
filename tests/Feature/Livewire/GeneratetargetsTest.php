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

    expect($targets)->toHaveCount(1);
});

it('be able increasing the number of targets over time', function () {
    $component = Volt::test('generate-targets');
    sleep(40);

    $component->call('generate');
    $targets = $component->get('targets');

    expect($targets)->toBeGreaterThanOrEqual(2);
});

it('be able to generate a random number of targets over time', function () {
    $component = Volt::test('generate-targets');
    sleep(20);

    $component->call('generate');
    $targets = $component->get('targets');

    expect(count($targets))->toBeGreaterThanOrEqual(1)->toBeLessThanOrEqual(2);
});

it('should be able delete target', function () {
    $component = Volt::test('generate-targets');
    $component->call('generate');

    $targets = $component->get('targets');
    expect($targets)->toHaveCount(1);

    $component->call('removeTarget', 0);
    $targets = $component->get('targets');

    expect($targets)->toHaveCount(0);
});
