<?php

declare(strict_types=1);

namespace Caffeinne\Container;

use Illuminate\Contracts\Foundation\Application;

class InterceptorCaller
{
    public function __construct(
        private readonly Application $app,
        private object $concrete,
        private array $interceptors = []
    ) {
    }

    public function __get(string $property)
    {
        return $this->concrete->{$property};
    }

    public function __set(string $property, $value)
    {
        $this->concrete->{$property} = $value;
    }

    public function __isset(string $property)
    {
        return property_exists($this->concrete, $property);
    }

    public function __call(string $method, array $arguments = [])
    {
        $beforeMethod = 'before'.ucfirst($method);
        $afterMethod = 'after'.ucfirst($method);

        $interceptorCache = [];

        foreach ($this->interceptors as $interceptorClass) {
            $interceptor = $this->app->make($interceptorClass);

            if (!$interceptor) {
                continue;
            }

            $interceptorCache[$interceptorClass] = $interceptor;

            if (!method_exists($interceptor, $beforeMethod)) {
                continue;
            }

            $interceptor->{$beforeMethod}($this->concrete, ...$arguments);
        }

        $result = $this->concrete->{$method}(...$arguments);

        foreach ($this->interceptors as $interceptorClass) {
            $interceptor = $interceptorCache[$interceptorClass];

            if (!method_exists($interceptor, $afterMethod)) {
                continue;
            }

            $interceptor->{$afterMethod}($this->concrete, $result, ...$arguments);
        }

        return $result;
    }
}
