<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\Domain\Model;


use Caffeinne\Model\Domain\Model\ID;

interface CartRepositoryInterface
{
    public function getByCustomerId(ID $id): Cart;
}
