<?php

declare(strict_types=1);


namespace Caffeinne\Catalog\App\Adapters\Model;

use Caffeinne\Catalog\Domain\Model\Product;
use Caffeinne\Catalog\Domain\Model\ProductFactoryInterface;
use Caffeinne\Model\Domain\Model\ID;
use function app;

class ProductFactoryAdapter implements ProductFactoryInterface
{
    public function create(
        ID $id,
        string $sku,
        float $price,
        int $stock = 0
    ): Product {
        return app(Product::class, [
            'id' => $id,
            'sku' => $sku,
            'price' => $price,
            'stock' => $stock,
        ]);
    }
}
