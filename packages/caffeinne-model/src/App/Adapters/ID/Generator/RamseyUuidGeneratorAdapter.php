<?php

declare(strict_types=1);

namespace Caffeinne\Model\App\Adapters\ID\Generator;

use Caffeinne\Model\App\Factories\IDFactory;
use Caffeinne\Model\Domain\Model\ID;
use Caffeinne\Model\Domain\Model\ID\GeneratorInterface;
use Ramsey\Uuid\Uuid;

class RamseyUuidGeneratorAdapter implements GeneratorInterface
{
    public function __construct(
        private readonly IDFactory $IDFactory
    ) {
    }

    public function generate(): ID
    {
        return $this->IDFactory->create(
            (string) Uuid::uuid4()
        );
    }
}
