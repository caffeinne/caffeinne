<?php

declare(strict_types=1);


namespace Caffeinne\Event\Domain\Model;


use Caffeinne\Event\Domain\Service\ExternalEventServiceInterface;

class DomainEventDispatcher
{

    protected ExternalEventServiceInterface $eventService;

    public function __construct(
        ExternalEventServiceInterface $eventService
    ) {
        $this->eventService = $eventService;
    }

    public function dispatch(DomainEventInterface $event)
    {
        $this->eventService->triggerEvent($event);
    }
}
