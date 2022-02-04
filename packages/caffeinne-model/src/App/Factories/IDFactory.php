<?php

declare(strict_types=1);


namespace Caffeinne\Model\App\Factories;


use Caffeinne\Model\Domain\Model\ID;
use Caffeinne\Model\Domain\Model\ID\FactoryInterface;

class IDFactory implements FactoryInterface
{

    public function create(string $id): ID
    {
        return app(ID::class, [
            'id' => $id,
        ]);
    }
}
