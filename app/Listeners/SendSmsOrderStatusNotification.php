<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use App\lib\Helpers;
use App\lib\sms;
use App\NotificationMessage;
use App\Setting;

class SendSmsOrderStatusNotification
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(OrderStatusChanged $event)
    {
        $areaCode = Setting::where('key', "area_code")->first()->value;

        $phone = strval($areaCode) . strval($event->user->phone);

        $content = 'without message. please completed pattern message of admin panel.';

        if ($event->notification->notificationMessages->count()) {
            $content = $event->notification->notificationMessages
                ->where('lang', Helpers::getLocaleUser($event->user))
                ->where('type', NotificationMessage::SMS_TYPE)
                ->first()->content;
        }

        (new sms())->sendSmsWithLinex($content, $phone);
    }
}
