<?php

declare(strict_types=1);

namespace Caffeinne\Event\App\Adapters\Service;

use Caffeinne\Event\Domain\Model\DomainEventInterface;
use Caffeinne\Event\Domain\Service\ExternalEventServiceInterface;

class ExternalEventServiceLaravelAdapter implements ExternalEventServiceInterface
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
