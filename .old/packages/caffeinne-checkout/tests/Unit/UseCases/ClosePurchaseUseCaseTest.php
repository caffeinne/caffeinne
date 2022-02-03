<?php

declare(strict_types=1);

use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Checkout\Services\CartService;
use Caffeinne\Cart\Models\Cart\Item;
use Caffeinne\TestSuite\Adapters\Factories\Order\ItemFactoryForTest;
use Caffeinne\TestSuite\Adapters\Factories\OrderFactoryForTest;
use Caffeinne\TestSuite\Adapters\Repository\CartRepositoryInMemory;
use Caffeinne\TestSuite\Adapters\Repository\OrderRepositoryInMemory;
use Caffeinne\TestSuite\Adapters\IdGeneratorForTests;
use Caffeinne\Checkout\UseCases\ClosePurchaseUseCase;
use Caffeinne\TestSuite\Adapters\Factories\Cart\ItemFactoryForTest as CartItemFactoryForTestAlias;
use Caffeinne\TestSuite\Adapters\Factories\Order\ItemFactoryForTest as OrderItemFactoryForTestAlias;

beforeEach(function(){
    $this->cartItemFactory = new CartItemFactoryForTestAlias();
    $this->orderItemFactory = new OrderItemFactoryForTestAlias();
    $this->orderFactory = new OrderFactoryForTest();
    $this->idGenerator = new IdGeneratorForTests();
    $this->orderRepository = new OrderRepositoryInMemory();
    $this->cartRepository = new CartRepositoryInMemory();

    $this->orderService = new CartService(
        $this->orderFactory,
        $this->orderItemFactory,
        $this->cartItemFactory,
        $this->idGenerator
    );
});

it('should close a purchase successfully', function (){

    $idCart = new ID('20741a4f-8951-4076-8092-4635d492b3a9');

    $cart = $this->cartRepository->find($idCart);

    $cart->addItem(new Item(
        new ID('f37acb7f-5521-4cc7-ac44-67e811ca4bee'),
        new ID('f96f4d29-12da-485b-ab9f-4a699456f21c'),
        10,
        1
    ));

    expect($this->orderRepository->length())->toBe(0);

    $closePurchaseUseCase = new ClosePurchaseUseCase(
        $this->cartRepository,
        $this->orderRepository,
        $this->orderService,
        $idCart
    );

    $closePurchaseUseCase->execute();

    expect($this->orderRepository->length())->toBe(1);
});

// trigger exception if stock is empty
