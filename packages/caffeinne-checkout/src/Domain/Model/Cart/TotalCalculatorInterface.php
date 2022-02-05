<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\Domain\Model\Cart;


interface TotalCalculatorInterface
{

    public function getTotal(): float;

    public function setItemsCollection(ItemCollection $collection): void;

}
