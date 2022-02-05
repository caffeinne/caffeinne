<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\App\Adapters\Model;

use Caffeinne\Checkout\Domain\Model\Cart\ItemCollection;
use Caffeinne\Checkout\Domain\Model\CartFactoryInterface;
use Caffeinne\Checkout\Domain\Model\CartInterface;
use Caffeinne\Model\Domain\Model\ID;

class CartFactoryAdapter implements CartFactoryInterface
{

    public function create(
        ID          $customerId,
        ?ItemCollection $collection = null
    ): CartInterface {
        return app(CartInterface::class, [
            'customerId' => $customerId
        ]);
    }
}
