<?php

declare(strict_types=1);


namespace Caffeinne\Core\Interfaces;


use Caffeinne\Core\Models\Entity\AbstractEntity;
use Caffeinne\Core\Models\Entity\ID;

interface RepositoryInterface
{

    public function find(ID $id) : ?AbstractEntity;

}
