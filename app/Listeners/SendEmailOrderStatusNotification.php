<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use App\Mail\NotificationOrdered;
use Illuminate\Support\Facades\Mail;

class SendEmailOrderStatusNotification
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(OrderStatusChanged $event)
    {
        Mail::to($event->user->email)->send(new NotificationOrdered($event->user, $event->notification));
    }
}
