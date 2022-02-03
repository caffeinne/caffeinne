<?php

use Caffeinne\Catalog\Models\Product;
use Caffeinne\TestSuite\Adapters\Factories\Cart\ItemFactoryForTest as CartItemFactoryForTestAlias;
use Caffeinne\TestSuite\Adapters\Factories\Order\ItemFactoryForTest as OrderItemFactoryForTestAlias;
use Caffeinne\TestSuite\Adapters\Factories\OrderFactoryForTest;
use Caffeinne\TestSuite\Adapters\IdGeneratorForTests;
use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Cart\Models\Cart\Item;
use Caffeinne\Checkout\Services\CartService;

beforeEach(function(){
    $this->cartItemFactory = new CartItemFactoryForTestAlias();
    $this->orderItemFactory = new OrderItemFactoryForTestAlias();
    $this->orderFactory = new OrderFactoryForTest();
    $this->idGenerator = new IdGeneratorForTests();
});

it('should convert product in cart item successfully', function(){

    $product = new Product(
        new ID('f96f4d29-12da-485b-ab9f-4a699456f21c'),
        'product-a',
        10,
        3
    );

    $cartService = new CartService(
        $this->orderFactory,
        $this->orderItemFactory,
        $this->cartItemFactory,
        $this->idGenerator
    );

    $item = $cartService->convertProductInCartItem($product, 1);

    expect($item)->toBeInstanceOf(Item::class);
    expect((string) $item->productId())->toBe((string)$product->id());
    expect($item->price())->toBe($product->price());
    expect($item->quantity())->toBe(1);


});
