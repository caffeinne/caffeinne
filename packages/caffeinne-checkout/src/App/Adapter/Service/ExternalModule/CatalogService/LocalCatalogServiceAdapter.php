<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\App\Adapter\Service\ExternalModule\CatalogService;

use Caffeinne\Checkout\Domain\Model\Cart;
use Caffeinne\Checkout\Domain\Model\Cart\Item;
use Caffeinne\Checkout\Domain\Service\ExternalModule\CatalogServiceInterface;
use Caffeinne\Model\Domain\Model\ID;

class LocalCatalogServiceAdapter implements CatalogServiceInterface
{

    public function transformProductIntoCartItem(ID $id): Item
    {
        return app(Cart\Item\ItemFactoryInterface::class)->create(
            $id,
            'product-sku',
            5,
            10
        );
    }
}
