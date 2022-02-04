<?php

use Caffeinne\Checkout\App\Adapter\Service\ExternalModule\CatalogService\LocalCatalogServiceAdapter;
use Caffeinne\Checkout\App\Factories\Cart\ItemFactory;
use Caffeinne\Checkout\Domain\Model\Cart;
use Caffeinne\Checkout\Domain\Model\Cart\Item\ItemFactoryInterface;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculator\DiscountTotalCalculator;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculator\SubtotalTotalCalculator;
use Caffeinne\Checkout\Domain\Model\CartInterface;
use Caffeinne\Checkout\Domain\Model\Checkout;
use Caffeinne\Checkout\Domain\Model\CheckoutInterface;
use Caffeinne\Checkout\Domain\Service\ExternalModule\CatalogServiceInterface;

return [
    'bindings' => [
        CheckoutInterface::class => Checkout::class,
        CartInterface::class => Cart::class,
    ],
    'singletons' => [
        ItemFactoryInterface::class => ItemFactory::class,
        CatalogServiceInterface::class => LocalCatalogServiceAdapter::class,
    ],
    'cart' => [
        'calculators' => [
            DiscountTotalCalculator::class,
            SubtotalTotalCalculator::class,
        ]
    ]
];
