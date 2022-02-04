<?php

declare(strict_types=1);

namespace Caffeinne\Catalog\Domain\Model;

use Caffeinne\Model\Domain\Model\ID;

class Product
{
    public function __construct(
        public readonly ID $id,
        public string $sku,
        public float $price,
        public int $quantity = 0
    ) {
    }

    public function haveStock(int $qty=0)
    {
        return $this->quantity >= $qty;
    }
}
