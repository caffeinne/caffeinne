<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model;

use Caffeinne\Checkout\Domain\Model\Cart\Item\Collection;
use Caffeinne\Checkout\Domain\Model\Cart\ItemInterface;
use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculatorInterface;

class Cart
{
    private array $totalCalculators = [];

    public function __construct(
        public readonly Collection $collection = new Collection()
    ) {
    }

    public function addItem(ItemInterface $item): void
    {
        $this->collection->addItem($item);
    }

    public function addTotalCalculator(TotalCalculatorInterface $total): void
    {
        $this->totalCalculators[] = $total;

        $total->setItemsCollection($this->collection);
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
