<?php

declare(strict_types=1);


namespace Caffeinne\Catalog\UseCases\Product;


use Caffeinne\Catalog\Interfaces\ProductRepositoryInterface;
use Caffeinne\Catalog\Models\Product;

class InsertNewProductUseCase
{

    /** @var ProductRepositoryInterface  */
    private ProductRepositoryInterface $productRepository;

    /** @var Product  */
    private Product $product;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        Product $product
    ){

        $this->productRepository = $productRepository;
        $this->product = $product;
    }

    public function execute()
    {
        return $this->productRepository->save($this->product);
    }
}
