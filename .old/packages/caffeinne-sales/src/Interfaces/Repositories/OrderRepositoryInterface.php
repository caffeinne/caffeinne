<?php

declare(strict_types=1);


namespace Caffeinne\Sales\Interfaces\Repositories;


use Caffeinne\Core\Interfaces\RepositoryInterface;
use Caffeinne\Sales\Models\Order;

interface OrderRepositoryInterface extends RepositoryInterface
{

    public function save(Order $order) : bool;
}
