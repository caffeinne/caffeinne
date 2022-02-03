<?php

declare(strict_types=1);


namespace Caffeinne\TestSuite\Adapters\Factories;


use Caffeinne\Sales\Interfaces\Factories\OrderFactoryInterface;
use Caffeinne\Sales\Models\Order;

class OrderFactoryForTest implements OrderFactoryInterface
{

    public function create(...$arguments): Order
    {
        return new Order(...$arguments);
    }
}
