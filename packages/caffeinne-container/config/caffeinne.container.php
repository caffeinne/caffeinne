<?php

use Caffeinne\Container\App\Adapters\ContainerLaravelAppAdapter;
use Caffeinne\Container\App\InterceptorManager;
use Caffeinne\Container\App\InterceptorManagerInterface;
use Caffeinne\Container\Domain\ContainerInterface;

return [
    'bindings' => [

    ],
    'singletons' => [
        InterceptorManagerInterface::class => InterceptorManager::class,
        ContainerInterface::class => ContainerLaravelAppAdapter::class
    ],
];
