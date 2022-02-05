<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model;

use Caffeinne\Checkout\Domain\Model\Cart\Item;
use Caffeinne\Checkout\Domain\Model\Cart\ItemCollection;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculatorManagerInterface;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculatorInterface;
use Caffeinne\Model\Domain\Model\ID;

class Cart implements CartInterface
{

    protected array $totalsCache = [];

    public function __construct(
        public readonly ID $customerId,
        public readonly ItemCollection $itemsCollection,
        protected readonly TotalCalculatorManagerInterface $totalCalculators
    ) {
    }

    public function addItem(Item $item): self
    {
        $this->itemsCollection->addItem($item);

        return $this;
    }

    public function getTotal(): float
    {
        $total = 0;

        if (!$this->totalsCache) {
            $this->totalsCache = $this->totalCalculators->getCalculators($this->itemsCollection);
        }

        /** @var TotalCalculatorInterface $totalCalculator */
        foreach ($this->totalsCache as $totalCalculator) {
            $total += $totalCalculator->getTotal();
        }

        return $total;
    }
}
