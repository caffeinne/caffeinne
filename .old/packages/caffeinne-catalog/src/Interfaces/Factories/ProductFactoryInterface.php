<?php

declare(strict_types=1);

namespace Caffeinne\Catalog\Interfaces\Factories;

use Caffeinne\Catalog\Models\Product;
use Caffeinne\Core\Models\Entity\ID;

interface ProductFactoryInterface
{

    public function create(
        ID $id,
        string $sku,
        float $price,
        int $quantity
    ) : Product;

}
