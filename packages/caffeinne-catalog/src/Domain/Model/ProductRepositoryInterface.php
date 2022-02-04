<?php

declare(strict_types=1);


namespace Caffeinne\Catalog\Domain\Model;


use Caffeinne\Model\Domain\Model\ID;

interface ProductRepositoryInterface
{
    public function getById(ID $id): ?Product;
}
