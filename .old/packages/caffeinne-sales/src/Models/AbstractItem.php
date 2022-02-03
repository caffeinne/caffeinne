<?php

declare(strict_types=1);


namespace Caffeinne\Sales\Models;


use Caffeinne\Core\Attributes\GetterAndSetterAttribute;
use Caffeinne\Core\Models\Entity\AbstractEntity;
use Caffeinne\Core\Models\Entity\ID;

class AbstractItem extends AbstractEntity
{
    #[GetterAndSetterAttribute]
    protected $productId;

    #[GetterAndSetterAttribute]
    protected $quantity;

    #[GetterAndSetterAttribute]
    protected $price;

    public function __construct(
        ID $id,
        ID $productId,
        float $price,
        int $quantity = 0,
    ) {
        parent::__construct($id);

        $this->price = $price;
        $this->quantity = $quantity;
        $this->productId = $productId;
    }

}
