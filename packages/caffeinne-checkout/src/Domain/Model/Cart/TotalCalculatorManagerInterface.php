<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\Domain\Model\Cart;


interface TotalCalculatorManagerInterface
{
    public function register(string $calculatorClass): self;

    public function registerMany(array $calculatorClasses): self;

    public function getCalculators(ItemCollectionInterface $itemCollection): array;
}
