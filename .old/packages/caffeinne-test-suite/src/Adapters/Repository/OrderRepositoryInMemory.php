<?php

declare(strict_types=1);


namespace Caffeinne\TestSuite\Adapters\Repository;


use Caffeinne\Core\Models\Entity\AbstractEntity;
use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Sales\Models\Order;
use Caffeinne\Sales\Interfaces\Repositories\OrderRepositoryInterface;

class OrderRepositoryInMemory implements OrderRepositoryInterface
{

    protected array $orders = [];

    protected array $firstIDs = [

    ];

    public function __construct()
    {
        foreach($this->firstIDs as $uuid){
            $this->orders = [
                $uuid => new Order(new ID($uuid))
            ];
        }
    }

    /**
     * @param ID $id
     * @return Order|null
     */
    public function find(ID $id): ?AbstractEntity
    {
        $uuidInString = (string) $id;

        return $this->orders[$uuidInString] ?? null;
    }

    public function length()
    {
        return count($this->orders);
    }

    public function save(Order $order) : bool
    {
        $this->orders[] = $order;

        return true;
    }
}
