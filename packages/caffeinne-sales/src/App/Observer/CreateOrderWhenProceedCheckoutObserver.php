<?php

declare(strict_types=1);


namespace Caffeinne\Sales\App\Observer;


use Caffeinne\Checkout\Domain\Event\CheckoutProceeded;
use function dump;

class CreateOrderWhenProceedCheckoutObserver
{

    public function handle(CheckoutProceeded $evento)
    {
        dump($evento);
    }
}
