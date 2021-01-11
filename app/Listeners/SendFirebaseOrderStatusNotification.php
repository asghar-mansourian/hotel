<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;

class SendFirebaseOrderStatusNotification
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(OrderStatusChanged $event)
    {
//        Mail::to($event->user->email)->send(new NotificationOrdered($event->notification));
    }
}
