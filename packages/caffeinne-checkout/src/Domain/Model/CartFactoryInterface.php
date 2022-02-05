<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model;

use Caffeinne\Checkout\Domain\Model\Cart\ItemCollection;
use Caffeinne\Model\Domain\Model\ID;

interface CartFactoryInterface
{
    public function create(
        ID          $customerId,
        ?ItemCollection $collection = null
    ): CartInterface;
}
