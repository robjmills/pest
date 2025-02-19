<?php

test('visual snapshot of help command output', function () {
    $output = function () {
        $process = (new Symfony\Component\Process\Process(['php', 'bin/pest', '--version'], null, ['COLLISION_PRINTER' => 'DefaultPrinter', 'COLLISION_IGNORE_DURATION' => 'true']));

        $process->run();

        return preg_replace('#\\x1b[[][^A-Za-z]*[A-Za-z]#', '', $process->getOutput());
    };

    expect($output())->toMatchSnapshot();
})->skipOnWindows()->skip(! getenv('REBUILD_SNAPSHOTS') && getenv('EXCLUDE'));
