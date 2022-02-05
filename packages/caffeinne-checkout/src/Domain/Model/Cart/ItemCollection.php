<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model\Cart;

class ItemCollection implements ItemCollectionInterface
{

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
