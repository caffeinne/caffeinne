<?php

declare(strict_types=1);


namespace Caffeinne\TestSuite\Adapters\Repository;


use Caffeinne\Catalog\Models\Product;
use Caffeinne\Catalog\Interfaces\ProductRepositoryInterface;
use Caffeinne\Core\Models\Entity\AbstractEntity;
use Caffeinne\Core\Models\Entity\ID;


class ProductRepositoryInMemory implements ProductRepositoryInterface
{

    private array $products = [];

    /**
     * @param ID $id
     * @return Product|null
     */
    public function find(ID $id): ?AbstractEntity
    {
        $idInString = (string) $id;

        return $this->products[$idInString] ?? null;
    }

    public function length()
    {
        return count($this->products);
    }

    public function save(Product $product): bool
    {
        $this->products[] = $product;

        return true;
    }
}
