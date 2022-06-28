<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Events\TicketEvent;
use App\Listeners\TicketListener;
use App\Notifications\TicketNotification;

class TicketListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Se consulta el id del usuario encargado para envio de notificacion
        User::findOrFail($event->ticket->id_manager)->notify(new TicketNotification($event->ticket));
    }
}