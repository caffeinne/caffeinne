<?php

declare(strict_types=1);


namespace Caffeinne\Sales\Interfaces\Factories\Order;


use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Sales\Models\Order\Item;

interface ItemFactoryInterface
{

    public function create(
        ID $id,
        ID $productId,
        float $price,
        int $quantity = 0
    ) : Item;

}
