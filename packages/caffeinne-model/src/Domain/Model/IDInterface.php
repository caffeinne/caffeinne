<?php

declare(strict_types=1);


namespace Caffeinne\Model\Domain\Model;


interface IDInterface
{
    public function isEqual(ID $otherId): bool;

    public function __toString(): string;
}
