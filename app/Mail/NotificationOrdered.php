<?php

namespace App\Mail;

use App\lib\Helpers;
use App\NotificationMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationOrdered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $notification;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $notification)
    {
        $this->user = $user;
        $this->notification = $notification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $notificationMessage = null;

        if ($this->notification->notificationMessages->count()) {
            $notificationMessage = $this->notification->notificationMessages
                ->where('lang', Helpers::getLocaleUser($this->user))
                ->where('type', NotificationMessage::EMAIL_TYPE)
                ->first();
        }

        return $this
            ->view('mails.notification_ordered')
            ->subject($notificationMessage ? $notificationMessage->title : 'without title')
            ->with(['notificationMessage' => $notificationMessage]);
    }
}
