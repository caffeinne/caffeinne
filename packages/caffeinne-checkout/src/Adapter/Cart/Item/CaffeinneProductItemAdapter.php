<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Adapter\Cart\Item;

use Caffeinne\Catalog\Domain\Model\Product;
use Caffeinne\Checkout\Domain\Model\Cart\ItemInterface;

class CaffeinneProductItemAdapter implements ItemInterface
{

    protected Product $product;

    public function __construct(
        Product $product
    ) {
        $this->product = $product;
    }

    public function getPrice(): float
    {
        return $this->product->price;
    }
}
