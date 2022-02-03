<?php

declare(strict_types=1);

use Caffeinne\Catalog\Models\Product;
use Caffeinne\TestSuite\Adapters\Factories\Cart\ItemFactoryForTest as CartItemFactoryForTestAlias;
use Caffeinne\TestSuite\Adapters\Factories\CartFactoryForTest;
use Caffeinne\TestSuite\Adapters\Factories\Order\ItemFactoryForTest as OrderItemFactoryForTestAlias;
use Caffeinne\TestSuite\Adapters\Factories\OrderFactoryForTest;
use Caffeinne\TestSuite\Adapters\Repository\ProductRepositoryInMemory;
use Caffeinne\TestSuite\Adapters\IdGeneratorForTests;
use Caffeinne\Core\Exceptions\DomainErrorException;
use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Checkout\UseCases\AddProductToCartUseCase;
use Caffeinne\TestSuite\Adapters\Repository\CartRepositoryInMemory;

beforeEach(function(){
    $this->cartItemFactory = new CartItemFactoryForTestAlias();
    $this->orderItemFactory = new OrderItemFactoryForTestAlias();
    $this->orderFactory = new OrderFactoryForTest();
    $this->idGenerator = new IdGeneratorForTests();
    $this->productRepository = new ProductRepositoryInMemory();
    $this->cartRepository = new CartRepositoryInMemory();
    $this->cartFactory = new CartFactoryForTest();

    $this->cartService = new \Caffeinne\Checkout\Services\CartService(
        $this->orderFactory,
        $this->orderItemFactory,
        $this->cartItemFactory,
        $this->idGenerator
    );
});

it('should add one product to a cart that already exists', function() {

    $idOwner = new ID('6eeafebc-ec76-442d-ae4f-8d570705f9bc');

    $product = new Product(
        new ID('f92b19ad-0bde-4a20-a552-ed8dd3eb45a1'),
        'aaa',
        9.9,
        10
    );

    $cart = $this->cartRepository->find(
        new ID('20741a4f-8951-4076-8092-4635d492b3a9')
    );

    expect(
        $cart->length()
    )->toBe(0);

    $addProductToCartuseCase = new AddProductToCartUseCase(
        $this->cartFactory,
        $this->cartRepository,
        $this->cartItemFactory,
        $this->idGenerator,
        $this->cartService,
        $idOwner,
        $product,
        3
    );

    $addProductToCartuseCase->execute();

    expect(
        $cart->length()
    )->toBe(1);

});


it('should add one product to a cart that not exists', function() {

    $idOwner = new ID('f92b19ad-0bde-4a20-a552-ed8dd3eb45a1'); // this id doesn't exists in repository

    $cart = $this->cartRepository->find(
        new ID('20741a4f-8951-4076-8092-4635d492b3a9')
    );

    $product = new Product(
        new ID('f92b19ad-0bde-4a20-a552-ed8dd3eb45a1'),
        'aaa',
        9.9,
        10
    );

    expect(
        $this->cartRepository->count()
    )->toBe(1);

    $addProductToCartuseCase = new AddProductToCartUseCase(
        $this->cartFactory,
        $this->cartRepository,
        $this->cartItemFactory,
        $this->idGenerator,
        $this->cartService,
        $idOwner,
        $product,
        3
    );

    $addProductToCartuseCase->execute();

    expect(
        $this->cartRepository->count()
    )->toBe(2);

});

it('should trigger exception if product doesn\'t have enough stock', function() {

    $idOwner = new ID('6eeafebc-ec76-442d-ae4f-8d570705f9bc');

    $product = new Product(
        new ID('f92b19ad-0bde-4a20-a552-ed8dd3eb45a1'),
        'aaa',
        9.9,
        1
    );

    $addProductToCartuseCase = new AddProductToCartUseCase(
        $this->cartFactory,
        $this->cartRepository,
        $this->cartItemFactory,
        $this->idGenerator,
        $this->cartService,
        $idOwner,
        $product,
        3
    );

    $addProductToCartuseCase->execute();

})->throws(DomainErrorException::class, "Product doesn't have enough stock");

