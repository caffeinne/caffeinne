<?php

declare(strict_types=1);

namespace Caffeinne\Model\Domain\Model\ID;

use Caffeinne\Model\Domain\Model\ID;

interface GeneratorInterface
{
    public function generate(): ID;
}
