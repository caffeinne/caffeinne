<?php

declare(strict_types=1);


namespace Caffeinne\Laravel\Catalog\Adapters\Factories;


use Caffeinne\Catalog\Interfaces\Factories\ProductFactoryInterface;
use Caffeinne\Catalog\Models\Product;
use Caffeinne\Core\Models\Entity\ID;

class ProductFactoryAdapter implements ProductFactoryInterface
{

    public function create(ID $id, string $sku, float $price, int $quantity): Product
    {
        return app(Product::class, [
            'id' => $id,
            'sku' => $sku,
            'price' => $price,
            'quantity' => $quantity
        ]);
    }
}
