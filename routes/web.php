<?php

use Caffeinne\Checkout\Adapter\Cart\Item\CaffeinneProductItemAdapter;
use Caffeinne\Checkout\Domain\Model\Cart;
use Caffeinne\Checkout\Domain\Model\Checkout;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');

    $laravelEventService = app(\Caffeinne\Event\Adapter\Service\EventService\LaravelExternalEventDispatcherAdapter::class);

    $eventDispacher = new \Caffeinne\Event\Domain\Model\DomainEventDispatcher($laravelEventService);

    $product1 = new \Caffeinne\Catalog\Domain\Model\Product(
        new \Caffeinne\Model\Domain\Model\ID('704cb84a-ed46-4fdb-a1a2-4370b1a3ebf2'),
        'product-1',
        5,
        10
    );

    $product2 = new \Caffeinne\Catalog\Domain\Model\Product(
        new \Caffeinne\Model\Domain\Model\ID('704cb84a-ed46-4fdb-a1a2-4370b1a3ebf2'),
        'product-2',
        5,
        10
    );

    $cart = new Cart();

    $cart->addItem(
        new CaffeinneProductItemAdapter($product1)
    );

    $cart->addItem(
        new CaffeinneProductItemAdapter($product2)
    );

    $cart->addTotalCalculator(
        new Cart\Totals\SubtotalTotalCalculator()
    );

    $cart->addTotalCalculator(
        new Cart\Totals\DiscountTotalCalculator()
    );

    $checkout = new Checkout($cart);

    $checkoutService = new \Caffeinne\Checkout\Domain\Service\CheckoutService($eventDispacher);

    $checkoutService->proceedCheckout($checkout);

    dd(
        $cart->getTotal(),
//        $order,
        $cart
    );
});
