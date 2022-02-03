<?php

declare(strict_types=1);


namespace Caffeinne\TestSuite\Adapters\Factories\Cart;


use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Cart\Interfaces\Factories\Cart\ItemFactoryInterface;
use Caffeinne\Cart\Models\Cart\Item;

class ItemFactoryForTest implements ItemFactoryInterface
{

    public function create(
        ID $id,
        ID $productId,
        float $price,
        int $quantity = 0
    ) : Item {
        return new Item($id, $productId, $price, $quantity);
    }
}
