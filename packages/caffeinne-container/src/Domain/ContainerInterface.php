<?php

declare(strict_types=1);


namespace Caffeinne\Container\Domain;


interface ContainerInterface
{
    public function new(string $class, array $arguments = []): object;
}
