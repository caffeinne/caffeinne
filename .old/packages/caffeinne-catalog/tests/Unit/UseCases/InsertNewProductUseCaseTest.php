<?php

use Caffeinne\Catalog\Models\Product;
use Caffeinne\TestSuite\Adapters\Repository\ProductRepositoryInMemory;
use Caffeinne\Catalog\UseCases\Product\InsertNewProductUseCase;
use Caffeinne\Core\Models\Entity\ID;

beforeEach(function(){
    $this->productRepository = new ProductRepositoryInMemory();
});

it('should insert new product successfully', function(){

    $product = new Product(
        new ID('20741a4f-8951-4076-8092-4635d492b3a9'),
        'sku',
        9.99,
        10
    );

    expect($this->productRepository->length())->toBe(0);

    $insertNewProductUseCase = new InsertNewProductUseCase(
        $this->productRepository,
        $product
    );

    $insertNewProductUseCase->execute();

    expect($this->productRepository->length())->toBe(1);
});
