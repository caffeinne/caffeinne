<?php

declare(strict_types=1);

namespace Caffeinne\Container\App;

class InterceptorManager implements InterceptorManagerInterface
{
    private $registers = [];

    public function register(string $concreteClass, string $interceptorClass): void
    {
        if (!isset($this->registers[$concreteClass])) {
            $this->registers[$concreteClass] = [];
        }

        $this->registers[$concreteClass][] = $interceptorClass;
    }

    public function registerMany(string $concreteClass, array $interceptorClasses = []): void
    {
        foreach ($interceptorClasses as $interceptorClass) {
            $this->register($concreteClass, $interceptorClass);
        }
    }

    public function getInterceptors(): array
    {
        return $this->registers;
    }
}
