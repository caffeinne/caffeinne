<?php

declare(strict_types=1);


namespace Caffeinne\TestSuite\Adapters\Factories\Order;


use Caffeinne\Sales\Interfaces\Factories\Order\ItemFactoryInterface;
use Caffeinne\Sales\Models\Order\Item;

class ItemFactoryForTest implements ItemFactoryInterface
{

    public function create(...$arguments): Item
    {
        return new Item(...$arguments);
    }
}
