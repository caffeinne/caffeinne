<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model\Cart;

interface ItemInterface
{
    public function getPrice(): float;
}
