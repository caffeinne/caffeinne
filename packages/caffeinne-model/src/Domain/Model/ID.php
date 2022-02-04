<?php

declare(strict_types=1);

namespace Caffeinne\Model\Domain\Model;

// @TODO validate the UUID
class ID implements IDInterface
{
    public function __construct(
        private string $id
    ) {
    }

    public function isEqual(ID $otherId): bool
    {
        return $this->id === (string) $otherId;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
