<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\App\Adapters\Model;


use Caffeinne\Checkout\Domain\Model\Cart;
use Caffeinne\Checkout\Domain\Model\CartFactoryInterface;
use Caffeinne\Checkout\Domain\Model\CartRepositoryInterface;
use Caffeinne\Model\Domain\Model\ID;

class CartRepositoryStaticAdapter implements CartRepositoryInterface
{

    public function __construct(
        protected readonly CartFactoryInterface $cartFactory
    ) {
    }

    public function getByCustomerId(ID $customerId): Cart
    {
        return $this->cartFactory->create($customerId);
    }
}
