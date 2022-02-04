<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Domain\Service\ExternalModule;

use Caffeinne\Checkout\Domain\Model\Cart\Item;
use Caffeinne\Model\Domain\Model\ID;

interface CatalogServiceInterface
{
    public function transformProductIntoCartItem(ID $id): Item;
}
