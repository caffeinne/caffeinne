<?php

declare(strict_types=1);


namespace Caffeinne\Container\App;


interface InterceptorManagerInterface
{
    public function register(string $concreteClass, string $interceptorClass): void;

    public function registerMany(string $concreteClass, array $interceptorClasses = []): void;

    public function getInterceptors(): array;
}
