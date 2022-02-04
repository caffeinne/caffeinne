<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\Domain\Model\Cart;


use Caffeinne\Checkout\Domain\Model\Cart\Item\Collection;

interface TotalCalculatorInterface
{

    public function getTotal(): float;

    public function setItemsCollection(Collection $collection): void;

}
