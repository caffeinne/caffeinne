<?php

declare(strict_types=1);


namespace Caffeinne\Event\Adapter\Service\EventService;


use Caffeinne\Event\Domain\Model\DomainEventInterface;
use Caffeinne\Event\Domain\Service\ExternalEventServiceInterface;

class LaravelExternalEventDispatcherAdapter implements ExternalEventServiceInterface
{

    protected \Illuminate\Events\Dispatcher $laravelDispatcher;

    public function __construct(
        \Illuminate\Events\Dispatcher $laravelDispatcher
    ) {
        $this->laravelDispatcher = $laravelDispatcher;
    }

    public function triggerEvent(DomainEventInterface $event): void
    {
        $this->laravelDispatcher->dispatch($event);
    }
}
