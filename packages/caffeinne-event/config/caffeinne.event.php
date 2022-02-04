<?php


use Caffeinne\Event\App\Adapter\Service\ExternalEventService\LaravelEventDispatcherAdapter;
use Caffeinne\Event\Domain\Service\ExternalEventServiceInterface;

return [
    'bindings' => [

    ],
    'singletons' => [
        ExternalEventServiceInterface::class => LaravelEventDispatcherAdapter::class
    ],
];
