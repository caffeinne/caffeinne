<?php

declare(strict_types=1);

namespace Caffeinne\Cart\Models;

use Caffeinne\Core\Attributes\GetterAndSetterAttribute;
use Caffeinne\Core\Models\Entity\AbstractEntity;
use Caffeinne\Cart\Models\Cart\Item;
use Caffeinne\Core\Models\Entity\ID;

class Cart extends AbstractEntity
{

    #[GetterAndSetterAttribute]
    protected ID $ownerId;

    public function __construct(
        ID $id,
        ID $ownerId,
    ){
        parent::__construct($id);

        $this->ownerId = $ownerId;
    }

    /**
     * Items that will be bought by customer
     * @var array
     */
    protected array $items = [];

    /**
     * Create and return a new cart item
     *
     * @param Item $item
     * @return Item
     */
    public function addItem(Item $item): Item
    {
        $this->items[] = $item;

        return $item;
    }

    /**
     * Return all cart items
     *
     * @return array
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Returns the quantity of items inside the cart
     *
     * @return int
     */
    public function length() : int
    {
        return count($this->items);
    }
}
