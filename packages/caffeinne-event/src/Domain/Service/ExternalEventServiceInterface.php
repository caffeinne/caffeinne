<?php

declare(strict_types=1);

namespace Caffeinne\Event\Domain\Service;

use Caffeinne\Event\Domain\Model\DomainEventInterface;

interface ExternalEventServiceInterface
{

    public function triggerEvent(DomainEventInterface $event): void;

}
