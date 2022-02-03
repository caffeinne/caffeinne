<?php

declare(strict_types=1);


namespace Caffeinne\Sales\Interfaces\Factories;


use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Sales\Models\Order;

interface OrderFactoryInterface
{

    public function create(ID $id) : Order;

}
