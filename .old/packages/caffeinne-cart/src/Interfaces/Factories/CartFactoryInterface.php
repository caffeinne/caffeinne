<?php

declare(strict_types=1);


namespace Caffeinne\Cart\Interfaces\Factories;


use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Cart\Models\Cart;

interface CartFactoryInterface
{

    public function create(ID $id, ID $ownerID) : Cart;

}
