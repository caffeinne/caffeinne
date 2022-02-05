<?php

use Caffeinne\Checkout\App\Adapters\Model\Cart\ItemFactoryAdapter;
use Caffeinne\Checkout\App\Adapters\Service\ExternalModule\CatalogService\LocalCatalogServiceAdapter;
use Caffeinne\Checkout\Domain\Model\Cart;
use Caffeinne\Checkout\Domain\Model\Cart\ItemFactoryInterface;
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
        ItemFactoryInterface::class => ItemFactoryAdapter::class,
        CatalogServiceInterface::class => LocalCatalogServiceAdapter::class,
    ],
    'cart' => [
        'calculators' => [
            DiscountTotalCalculator::class,
            SubtotalTotalCalculator::class,
        ]
    ]
];
