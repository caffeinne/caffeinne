<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model;

use Caffeinne\Checkout\Domain\Model\Cart\Item;
use Caffeinne\Checkout\Domain\Model\Cart\Item\Collection;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculatorInterface;

class Cart implements CartInterface
{
    private array $totalCalculators = [];

    public function __construct(
        public readonly Collection $collection = new Collection()
    ) {
    }

    public function addItem(Item $item): self
    {
        $this->collection->addItem($item);

        return $this;
    }

    public function addTotalCalculator(TotalCalculatorInterface $total): self
    {
        $this->totalCalculators[] = $total;

        $total->setItemsCollection($this->collection);

        return $this;
    }

    public function getTotal(): float
    {
        $total = 0;

        if (!$this->totalCalculators) {
            return $total;
        }

        /** @var TotalCalculatorInterface $totalCalculator */
        foreach ($this->totalCalculators as $totalCalculator) {
            $total += $totalCalculator->getTotal();
        }

        return $total;
    }
}
