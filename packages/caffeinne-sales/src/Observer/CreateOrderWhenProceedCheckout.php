<?php

declare(strict_types=1);


namespace Caffeinne\Sales\Observer;


use Caffeinne\Checkout\Domain\Event\CheckoutProceeded;

class CreateOrderWhenProceedCheckout
{

    public function handle(CheckoutProceeded $evento)
    {
        dump($evento);
    }
}