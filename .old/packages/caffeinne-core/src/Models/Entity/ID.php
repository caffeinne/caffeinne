<?php

declare(strict_types=1);


namespace Caffeinne\Core\Models\Entity;


class ID
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function isEqual(ID $otherId) : bool
    {
        return $this->id === (string) $otherId;
    }

    public function __toString()
    {
        return $this->id;
    }
}
