<?php

use Caffeinne\Model\App\Adapters\Model\IdGeneratorRamseyUuidAdapter;
use Caffeinne\Model\App\Adapters\Model\IDFactoryAdapter;
use Caffeinne\Model\Domain\Model\ID\GeneratorInterface;
use Caffeinne\Model\Domain\Model\IDFactoryInterface;

return [
    'bindings' => [

    ],
    'singletons' => [
        IDFactoryInterface::class => IDFactoryAdapter::class,
        GeneratorInterface::class => IdGeneratorRamseyUuidAdapter::class,
    ],
];
