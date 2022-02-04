<?php

use Caffeinne\Catalog\App\Adapters\Product\ProductFactoryAdapter;
use Caffeinne\Catalog\App\Adapters\Product\ProductRepository\FakerProductRepositoryAdapter;
use Caffeinne\Catalog\Domain\Model\ProductFactoryInterface;
use Caffeinne\Catalog\Domain\Model\ProductRepositoryInterface;

return [
    'bindings' => [

    ],
    'singletons' => [
        ProductRepositoryInterface::class => FakerProductRepositoryAdapter::class,
        ProductFactoryInterface::class => ProductFactoryAdapter::class,
    ],
];
