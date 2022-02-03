<?php

declare(strict_types=1);


namespace Caffeinne\Sales\Services;


use Caffeinne\Core\Interfaces\IdGeneratorInterface;
use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Sales\Interfaces\Factories\Order\ItemFactoryInterface;
use Caffeinne\Sales\Interfaces\Factories\OrderFactoryInterface;
use Caffeinne\Cart\Models\Cart;

class OrderService
{

    private $orderFactory;

    private $itemFactory;

    private $idGenerator;

    public function __construct(
        OrderFactoryInterface $orderFactory,
        ItemFactoryInterface $itemFactory,
        IdGeneratorInterface $idGenerator,
    ){
        $this->orderFactory = $orderFactory;
        $this->itemFactory = $itemFactory;
        $this->idGenerator = $idGenerator;
    }
}
