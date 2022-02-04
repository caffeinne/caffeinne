<?php

declare(strict_types=1);

namespace Caffeinne\Event\Domain\Model;

interface DomainEventInterface
{

    public function payload(): array;

    public function occuredOn(): \DateTimeImmutable;

}
