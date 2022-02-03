<?php

declare(strict_types=1);

namespace Caffeinne\Laravel\Cart\Adapters\Factories;

use Caffeinne\Cart\Interfaces\Factories\CartFactoryInterface;
use Caffeinne\Cart\Models\Cart;
use Caffeinne\Core\Models\Entity\ID;

class CartFactoryAdapter implements CartFactoryInterface
{

    public function create(ID $id, ID $ownerID): Cart
    {
        return app(Cart::class, [
            'id' => $id,
            'ownerId' => $ownerID
        ]);
    }
}
