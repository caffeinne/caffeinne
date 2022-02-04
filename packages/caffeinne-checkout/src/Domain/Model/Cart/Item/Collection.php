<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model\Cart\Item;

use Caffeinne\Checkout\Domain\Model\Cart\Item;

class Collection
{

    /**
     * @var array<ItemInterface>
     */
    private array $items = [];

    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
