<?php

use Caffeinne\Catalog\App\Adapters\Model\ProductRepositoryFakerAdapter;
use Caffeinne\Catalog\App\Adapters\Model\ProductFactoryAdapter;
use Caffeinne\Catalog\Domain\Model\ProductFactoryInterface;
use Caffeinne\Catalog\Domain\Model\ProductRepositoryInterface;

return [
    'bindings' => [

    ],
    'singletons' => [
        ProductRepositoryInterface::class => ProductRepositoryFakerAdapter::class,
        ProductFactoryInterface::class => ProductFactoryAdapter::class,
    ],
];
