<?php

declare(strict_types=1);


namespace Caffeinne\Model\Domain\Model;


interface IDFactoryInterface
{
    public function create(string $id): ID;
}
