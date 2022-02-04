<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Service;

use Caffeinne\Checkout\Domain\Event\CheckoutProceeded;
use Caffeinne\Checkout\Domain\Model\Checkout;
use Caffeinne\Event\Domain\Model\DomainEventDispatcher;

class CheckoutService
{

    public function __construct(
        public DomainEventDispatcher $eventDispatcher
    ){}

    public function proceedCheckout(Checkout $checkout)
    {
        $checkout->proceed();

        $this->eventDispatcher->dispatch(
            new CheckoutProceeded([
                'cart_total' => $checkout->cart->getTotal()
            ])
        );
    }
}
