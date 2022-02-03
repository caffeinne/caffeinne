<?php

declare(strict_types=1);


namespace Caffeinne\Catalog\Interfaces;


use Caffeinne\Catalog\Models\Product;
use Caffeinne\Core\Interfaces\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{

    public function save(Product $product) : bool;

}
