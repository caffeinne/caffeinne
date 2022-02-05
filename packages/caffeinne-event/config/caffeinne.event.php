<?php


use Caffeinne\Event\App\Adapters\Service\ExternalEventServiceLaravelAdapter;
use Caffeinne\Event\Domain\Service\ExternalEventServiceInterface;

return [
    'bindings' => [

    ],
    'singletons' => [
        ExternalEventServiceInterface::class => ExternalEventServiceLaravelAdapter::class
    ],
];
