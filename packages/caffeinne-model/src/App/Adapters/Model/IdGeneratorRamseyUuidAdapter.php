<?php

declare(strict_types=1);

namespace Caffeinne\Model\App\Adapters\Model;

use Caffeinne\Model\Domain\Model\ID;
use Caffeinne\Model\Domain\Model\ID\GeneratorInterface;
use Ramsey\Uuid\Uuid;

class IdGeneratorRamseyUuidAdapter implements GeneratorInterface
{
    public function __construct(
        private readonly IDFactoryAdapter $IDFactory
    ) {
    }

    public function generate(): ID
    {
        return $this->IDFactory->create(
            (string) Uuid::uuid4()
        );
    }
}
