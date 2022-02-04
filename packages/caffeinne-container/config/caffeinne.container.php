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

    ],
    'singletons' => [
        \Caffeinne\Container\InterceptorManagerInterface::class => \Caffeinne\Container\InterceptorManager::class
    ],
];
