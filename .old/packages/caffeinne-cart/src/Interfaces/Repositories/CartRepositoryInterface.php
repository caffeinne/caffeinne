<?php

declare(strict_types=1);


namespace Caffeinne\Cart\Interfaces\Repositories;


use Caffeinne\Cart\Models\Cart;
use Caffeinne\Core\Models\Entity\ID;

interface CartRepositoryInterface
{

    public function find(ID $id) : ?Cart;

    public function findByOwner(ID $ownerId) : ?Cart;

    public function save(Cart $cart) : bool;

}
