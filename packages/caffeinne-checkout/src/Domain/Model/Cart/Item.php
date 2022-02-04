<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\Domain\Model\Cart;


use Caffeinne\Model\Domain\Model\ID;

class Item
{
    public function __construct(
        public readonly ID $id,
        public readonly string $sku,
        public readonly float $originalPrice,
        public readonly int $quantity = 0
    ) {
    }

    public function getFinalPrice()
    {
        return $this->originalPrice;
    }
}
