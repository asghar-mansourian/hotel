<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use App\lib\FcmFirebase;
use App\lib\Helpers;
use App\NotificationMessage;

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
        $notificationMessage = null;

        if ($event->notification->notificationMessages->count()) {
            $notificationMessage = $event->notification->notificationMessages
                ->where('lang', Helpers::getLocaleUser($this->user))
                ->where('type', NotificationMessage::FIREBASE_TYPE)
                ->first();
        }

        if ($notificationMessage) {
            $requestData['notification']['title'] = $notificationMessage->title;
            $requestData['notification']['body'] = $notificationMessage->content;
            $requestData['data']['text'] = $notificationMessage->title;
            $requestData['data']['data'] = $notificationMessage->content;

            (new FcmFirebase())->sendToUser($event->user, $requestData);
        }
    }
}
