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

it('be able increasing the number of targets over time', function () {
    $component = Volt::test('generate-targets');
    sleep(20);

    $component->call('generate');
    $targets = $component->get('targets');

    expect(count($targets))->toBe(2);
});
