<?php

use Caffeinne\Checkout\App\Adapter\Cart\Item\CaffeinneProductItemAdapter;
use Caffeinne\Checkout\Domain\Model\CartInterface;
use Caffeinne\Checkout\Domain\Model\CartRepositoryInterface;
use Caffeinne\Checkout\Domain\Model\CheckoutInterface;
use Caffeinne\Checkout\Domain\Service\CartService;
use Caffeinne\Checkout\Domain\Service\CheckoutService;
use Caffeinne\Checkout\Domain\Service\ExternalModule\CatalogServiceInterface;
use Caffeinne\Model\Domain\Model\ID;
use Caffeinne\Model\Domain\Model\ID\GeneratorInterface;
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

    /** @var GeneratorInterface $idGenerator */
    $idGenerator = app(GeneratorInterface::class);

    $productId = $idGenerator->generate();
    $customerId = $idGenerator->generate();

    /** @var CartRepositoryInterface $cartRepository */
    $cartRepository = app(CartRepositoryInterface::class);
    $cart = $cartRepository->getByCustomerId($customerId);

    /** @var CartService $cartService */
    $cartService = app(CartService::class);
    $cartService->addProductToCart($productId, $cart);

    /** @var CheckoutInterface $checkout */
    $checkout = app(CheckoutInterface::class, [
        'cart' => $cart,
    ]);

    /** @var CheckoutService $checkoutService */
    $checkoutService = app(CheckoutService::class);

    $checkoutService->proceedCheckout($checkout);
});
