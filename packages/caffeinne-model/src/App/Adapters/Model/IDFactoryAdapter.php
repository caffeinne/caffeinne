<?php

declare(strict_types=1);


namespace Caffeinne\Model\App\Adapters\Model;


use Caffeinne\Model\Domain\Model\ID;
use Caffeinne\Model\Domain\Model\IDFactoryInterface;
use function app;

class IDFactoryAdapter implements IDFactoryInterface
{

    public function create(string $id): ID
    {
        return app(ID::class, [
            'id' => $id,
        ]);
    }
}
