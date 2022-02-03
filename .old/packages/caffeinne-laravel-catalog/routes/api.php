<?php

use Caffeinne\Core\Models\Entity\ID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Caffeinne\Catalog\Models\Product;
use Caffeinne\Catalog\UseCases\Product\InsertNewProductUseCase;
use Ramsey\Uuid\Uuid;

Route::get('/api/products', function(){
    return \Caffeinne\Laravel\Catalog\Models\ProductsModel::all();
});

Route::post('/api/products', function(Request $request){
    $id = new ID(Uuid::uuid4());

    $product = app(Product::class, [
        'id' => $id,
        'sku' => $request->input('sku'),
        'price' => $request->input('price'),
        'quantity' => $request->input('quantity')
    ]);

    $insertNewProductUseCase = app(InsertNewProductUseCase::class, [
        'product' => $product
    ]);

    $insertNewProductUseCase->execute();

    return [];
});
