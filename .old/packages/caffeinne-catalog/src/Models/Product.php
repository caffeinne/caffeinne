<?php

declare(strict_types=1);

namespace Caffeinne\Catalog\Models;


use Caffeinne\Core\Models\Entity\AbstractEntity;
use Caffeinne\Core\Attributes\GetterAndSetterAttribute;
use Caffeinne\Core\Models\Entity\ID;

class Product extends AbstractEntity
{

    #[GetterAndSetterAttribute]
    protected string $sku;

    #[GetterAndSetterAttribute]
    protected float $price;

    #[GetterAndSetterAttribute]
    protected int $quantity = 0;

    public function __construct(
        ID $id,
        string $sku,
        float $price,
        int $quantity = 0
    ) {
        parent::__construct($id);

        $this->sku = $sku;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function haveStock(int $qty)
    {
        return $this->quantity >= $qty;
    }

}
