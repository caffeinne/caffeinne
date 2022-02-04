<?php

declare(strict_types=1);


namespace Caffeinne\Event\Domain\Model;


abstract class AbstractDomainEvent implements DomainEventInterface
{
    public function __construct(
        public readonly array $payload,
        public readonly \DateTimeImmutable $occurredOn = new \DateTimeImmutable()
    ) { }

    public function occuredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }

    public function payload(): array
    {
        return $this->payload;
    }
}
