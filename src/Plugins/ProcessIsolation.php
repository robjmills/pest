<?php

declare(strict_types=1);

namespace Pest\Plugins;

use Pest\Contracts\Plugins\HandlesArguments;
use Pest\Exceptions\InvalidOption;
use Symfony\Component\Console\Input\ArgvInput;

/**
 * @internal
 */
final class ProcessIsolation implements HandlesArguments
{
    use Concerns\HandleArguments;

    /**
     * Whether the given command line arguments indicate that the test suite should allow for process isolation
     */
    public static function isEnabled(): bool
    {
        $argv = new ArgvInput();
        if ($argv->hasParameterOption('--process-isolation')) {
            return true;
        }

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function handleArguments(array $arguments): array
    {
        if (self::isEnabled()) {
            $this->pushArgument('--process-isolation', $arguments);
        }
        return $arguments;
    }
}
