<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\Domain\Model\Cart\Item;


use Caffeinne\Checkout\Domain\Model\Cart\Item;
use Caffeinne\Model\Domain\Model\ID;

interface ItemFactoryInterface
{

    public function create(
        ID $id,
        string $sku,
        float $price,
        int $quantity = 0
    ): Item;

}
