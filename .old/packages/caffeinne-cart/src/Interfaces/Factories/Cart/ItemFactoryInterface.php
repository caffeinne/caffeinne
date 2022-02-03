<?php

declare(strict_types=1);


namespace Caffeinne\Cart\Interfaces\Factories\Cart;


use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Cart\Models\Cart\Item;

interface ItemFactoryInterface
{

    public function create(
        ID $id,
        ID $productId,
        float $price,
        int $quantity = 0
    ) : Item;

}
