<?php

declare(strict_types=1);


namespace Caffeinne\Laravel\Catalog\Adapters\Repositories;


use Caffeinne\Catalog\Interfaces\Factories\ProductFactoryInterface;
use Caffeinne\Catalog\Interfaces\ProductRepositoryInterface;
use Caffeinne\Catalog\Models\Product;
use Caffeinne\Core\Models\Entity\AbstractEntity;
use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Laravel\Catalog\Models\ProductsModel;

class ProductRepositoryAdapter implements ProductRepositoryInterface
{

    protected ProductFactoryInterface $productFactory;

    public function __construct(
        ProductFactoryInterface $productFactory
    ) {
        $this->productFactory = $productFactory;
    }

    public function find(ID $id): ?AbstractEntity
    {
        $model = ProductsModel::where('uuid', (string) $id)->first();

        if(!$model){
            return null;
        }

        return $this->productFactory->create(
            new ID($model->uuid),
            $model->sku,
            (float) $model->price,
            $model->quantity
        );
    }

    public function save(Product $product): bool
    {
        $model = new ProductsModel([
            'uuid' => $product->id(),
            'sku' => $product->sku(),
            'price' => $product->price(),
            'quantity' => $product->quantity()
        ]);

        return $model->save();
    }
}
