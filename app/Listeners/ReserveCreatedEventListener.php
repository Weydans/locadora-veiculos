<?php

namespace App\Listeners;

use App\Events\ReserveCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ReserveCreatedEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReserveCreatedEvent $event): void
    {
        Log::info("Reserva criada: carro id {$event->carId}, usuário id {$event->userId}");
    }
}
