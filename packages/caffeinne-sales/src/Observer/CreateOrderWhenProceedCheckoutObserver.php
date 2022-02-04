<?php

declare(strict_types=1);


namespace Caffeinne\Sales\Observer;


use Caffeinne\Checkout\Domain\Event\CheckoutProceeded;

class CreateOrderWhenProceedCheckoutObserver
{

    public function handle(CheckoutProceeded $evento)
    {
        dump($evento);
    }
}
