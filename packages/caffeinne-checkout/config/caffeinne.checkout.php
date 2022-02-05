<?php

use Caffeinne\Checkout\App\Adapters\Model\Cart\ItemFactoryAdapter;
use Caffeinne\Checkout\App\Adapters\Model\CartFactoryAdapter;
use Caffeinne\Checkout\App\Adapters\Model\CartRepositoryStaticAdapter;
use Caffeinne\Checkout\App\Adapters\Service\ExternalModule\CatalogService\LocalCatalogServiceAdapter;
use Caffeinne\Checkout\Domain\Model\Cart;
use Caffeinne\Checkout\Domain\Model\Cart\ItemCollection;
use Caffeinne\Checkout\Domain\Model\Cart\ItemCollectionInterface;
use Caffeinne\Checkout\Domain\Model\Cart\ItemFactoryInterface;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculator\DiscountTotalCalculator;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculator\SubtotalTotalCalculator;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculatorManagerInterface;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculatorManager;
use Caffeinne\Checkout\Domain\Model\CartFactoryInterface;
use Caffeinne\Checkout\Domain\Model\CartInterface;
use Caffeinne\Checkout\Domain\Model\CartRepositoryInterface;
use Caffeinne\Checkout\Domain\Model\Checkout;
use Caffeinne\Checkout\Domain\Model\CheckoutInterface;
use Caffeinne\Checkout\Domain\Service\ExternalModule\CatalogServiceInterface;

return [
    'bindings' => [
        CartInterface::class => Cart::class,
        ItemCollectionInterface::class => ItemCollection::class
    ],
    'singletons' => [
        CheckoutInterface::class => Checkout::class,
        ItemFactoryInterface::class => ItemFactoryAdapter::class,
        TotalCalculatorManagerInterface::class => TotalCalculatorManager::class,
        CatalogServiceInterface::class => LocalCatalogServiceAdapter::class,
        CartFactoryInterface::class => CartFactoryAdapter::class,
        CartRepositoryInterface::class => CartRepositoryStaticAdapter::class,
    ],
    'cart' => [
        'calculators' => [
            DiscountTotalCalculator::class,
            SubtotalTotalCalculator::class,
        ]
    ]
];
