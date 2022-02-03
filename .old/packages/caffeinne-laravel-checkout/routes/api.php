<?php

use Caffeinne\Catalog\Interfaces\ProductRepositoryInterface;
use Caffeinne\Checkout\UseCases\AddProductToCartUseCase;
use Caffeinne\Core\Models\Entity\ID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/api/checkout/cart', function(Request $request){
    return [];
});

Route::post('/api/checkout/cart/add-product', function(
    Request $request,
    ProductRepositoryInterface $productRepository
){
    $product = $productRepository->find(
        new ID($request->input('id'))
    );

    if(!$product){
        abort(404, 'Product not found');
    }

    $addProductToCartUseCase = app(AddProductToCartUseCase::class, [
        'product' => $product,
        'idOwner' => new ID($request->input('owner_id')),
        'quantity' => (float) $request->input('quantity')
    ]);

    dd(
        $request->input('id'),
        $request->input('owner_id'),
        $request->input('quantity'),
        $addProductToCartUseCase
    );

    return [];
});
