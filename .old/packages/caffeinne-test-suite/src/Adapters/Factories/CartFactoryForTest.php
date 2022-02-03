<?php

declare(strict_types=1);


namespace Caffeinne\TestSuite\Adapters\Factories;


use Caffeinne\Cart\Interfaces\Factories\CartFactoryInterface;
use Caffeinne\Cart\Models\Cart;
use Caffeinne\Core\Models\Entity\ID;

class CartFactoryForTest implements CartFactoryInterface
{

    public function create(ID $id, ID $ownerID) : Cart
    {
        return new Cart($id, $ownerID);
    }
}
