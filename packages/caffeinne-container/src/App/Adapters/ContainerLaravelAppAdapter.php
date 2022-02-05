<?php

declare(strict_types=1);

namespace Caffeinne\Container\App\Adapters;

use Caffeinne\Container\Domain\ContainerInterface;

class ContainerLaravelAppAdapter implements ContainerInterface
{
    public function new(string $class, array $arguments = []): object
    {
        return app($class, $arguments);
    }
}
