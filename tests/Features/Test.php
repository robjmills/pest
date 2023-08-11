<?php

test('a test', function () {
    $this->assertArrayHasKey('key', ['key' => 'foo']);
})->runInSeparateProcess();

test('higher order message test')->expect(true)->toBeTrue();
