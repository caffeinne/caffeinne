<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\Domain\Model\Cart\Totals;


use Caffeinne\Checkout\Domain\Model\Cart\Item\Collection;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculatorInterface;

class SubtotalTotalCalculator implements TotalCalculatorInterface
{
    public Collection $itemsCollection;

    public function getTotal(): float
    {
        $totalDiscount = 0;

        foreach($this->itemsCollection->getItems() as $item){
            $totalDiscount += $item->getPrice();
        }

        return $totalDiscount;
    }

    public function setItemsCollection(Collection $collection): void
    {
        $this->itemsCollection = $collection;
    }
}
