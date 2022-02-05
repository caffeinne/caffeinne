<?php

declare(strict_types=1);


namespace Caffeinne\Catalog\App\Adapters\Model;


use Caffeinne\Catalog\Domain\Model\Product;
use Caffeinne\Catalog\Domain\Model\ProductFactoryInterface;
use Caffeinne\Catalog\Domain\Model\ProductRepositoryInterface;
use Caffeinne\Model\Domain\Model\ID;
use Faker\Generator;

class ProductRepositoryFakerAdapter implements ProductRepositoryInterface
{

    public function __construct(
        private Generator $faker,
        private ProductFactoryInterface $productFactory
    ) {
    }

    public function getById(ID $id): ?Product
    {
        return $this->productFactory->create(
            $id,
            $this->faker->word(),
            $this->faker->randomFloat(),
            $this->faker->randomDigit()
        );
    }
}
