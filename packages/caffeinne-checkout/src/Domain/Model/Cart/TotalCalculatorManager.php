<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Model\Cart;

use Caffeinne\Container\Domain\ContainerInterface;

class TotalCalculatorManager implements TotalCalculatorManagerInterface
{
    protected $calculators = [];

    public function __construct(
        protected ContainerInterface $container
    ) {
    }

    public function register(string $calculatorClass): self
    {
        if (!class_exists($calculatorClass)) {
            throw new \RuntimeException("The calculator class {$calculatorClass} do not exist.");
        }

        if (!in_array($calculatorClass, $this->calculators)) {
            $this->calculators[] = $calculatorClass;
        }

        return $this;
    }

    public function registerMany(array $calculatorClasses): self
    {
        foreach($calculatorClasses as $class){
            $this->register($class);
        }

        return $this;
    }

    public function getCalculators(ItemCollectionInterface $itemCollection): array
    {
        $container = $this->container;

        return array_map(function ($className) use ($itemCollection, $container) {
            /** @var TotalCalculatorInterface $calculator */
            $calculator = $container->new($className);
            $calculator->setItemsCollection($itemCollection);

            return $calculator;
        }, $this->calculators);
    }
}
