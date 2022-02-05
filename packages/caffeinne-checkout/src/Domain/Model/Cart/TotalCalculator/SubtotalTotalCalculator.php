<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\Domain\Model\Cart\TotalCalculator;


use Caffeinne\Checkout\Domain\Model\Cart\ItemCollection;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculatorInterface;

class SubtotalTotalCalculator implements TotalCalculatorInterface
{
    public ItemCollection $itemsCollection;

    public function getTotal(): float
    {
        $totalDiscount = 0;

        foreach($this->itemsCollection->getItems() as $item){
            $totalDiscount += $item->getFinalPrice();
        }

        return $totalDiscount;
    }

    public function setItemsCollection(ItemCollection $collection): void
    {
        $this->itemsCollection = $collection;
    }
}
