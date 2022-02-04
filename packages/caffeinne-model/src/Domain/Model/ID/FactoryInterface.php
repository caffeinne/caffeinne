<?php

declare(strict_types=1);


namespace Caffeinne\Model\Domain\Model\ID;


use Caffeinne\Model\Domain\Model\ID;

interface FactoryInterface
{
    public function create(string $id): ID;
}
