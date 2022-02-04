<?php

declare(strict_types=1);


namespace Caffeinne\Catalog\Domain\Model;


use Caffeinne\Model\Domain\Model\ID;

interface ProductFactoryInterface
{

    public function create(
        ID $id,
        string $sku,
        float $price,
        int $stock = 0
    ): Product;
}
