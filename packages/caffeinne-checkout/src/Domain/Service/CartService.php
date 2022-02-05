<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\Domain\Service;


use Caffeinne\Checkout\Domain\Model\CartInterface;
use Caffeinne\Checkout\Domain\Service\ExternalModule\CatalogServiceInterface;
use Caffeinne\Model\Domain\Model\ID;

class CartService
{

    public function __construct(
        protected CatalogServiceInterface $catalogService
    ) {
    }

    public function addProductToCart(ID $productId, CartInterface $cart)
    {
        $cart->addItem(
            $this->catalogService->transformProductIntoCartItem($productId)
        );

        // @TODO Trigger event

        return $this;
    }
}
