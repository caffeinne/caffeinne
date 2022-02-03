<?php

declare(strict_types=1);


namespace Caffeinne\Core\Interfaces;


interface IdGeneratorInterface
{
    public function generate() : string;
}
