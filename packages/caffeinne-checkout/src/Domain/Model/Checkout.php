<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model;

use Caffeinne\Checkout\Domain\Event\CheckoutProceeded;
use Caffeinne\Event\Domain\Model\DomainEventDispatcher;

class Checkout
{

    public function __construct(
        public Cart $cart,
    ){}

    public function proceed()
    {
        // @TODO change cart status to closed
        // $this->cart->close();
    }
}
