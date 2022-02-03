<?php

declare(strict_types=1);


namespace Caffeinne\Laravel\Cart\Adapters\Repositories;


use Caffeinne\Cart\Interfaces\Repositories\CartRepositoryInterface;
use Caffeinne\Cart\Models\Cart;
use Caffeinne\Core\Models\Entity\ID;

class CartRepositoryAdapter implements CartRepositoryInterface
{

    public function find(ID $id): ?Cart
    {
        // TODO: Implement find() method.
    }

    public function findByOwner(ID $ownerId): ?Cart
    {
        // TODO: Implement findByOwner() method.
    }

    public function save(Cart $cart): bool
    {
        // TODO: Implement save() method.
    }
}
