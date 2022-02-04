<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\App\Factories\Cart;

use Caffeinne\Checkout\Domain\Model\Cart\Item;
use Caffeinne\Checkout\Domain\Model\Cart\Item\ItemFactoryInterface;
use Caffeinne\Model\Domain\Model\ID;

class ItemFactory implements ItemFactoryInterface
{
    public function create(
        ID $id,
        string $sku,
        float $price,
        int $quantity = 0
    ): Item {
        return app(Item::class, [
            'id' => $id,
            'sku' => $sku,
            'originalPrice' => $price,
            'quantity' => $quantity
        ]);
    }
}
