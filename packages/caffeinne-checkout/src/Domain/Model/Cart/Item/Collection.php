<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model\Cart\Item;

use Caffeinne\Checkout\Domain\Model\Cart\ItemInterface;

class Collection
{

    /**
     * @var array<ItemInterface>
     */
    private array $items = [];

    public function addItem(ItemInterface $item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
