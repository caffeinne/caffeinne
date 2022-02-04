<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model;

class Checkout implements CheckoutInterface
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
