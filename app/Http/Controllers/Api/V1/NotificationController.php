<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use App\Notification as Notif;
use App\Notifications\SendEmailToUserNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function send(Request $request)
    {
        $user = $this->getUser($request);
        $type = $this->getValue($request);
        $this->sendEmail($user, $type);
        return;
    }

    /**
     * @param $user
     * @param $type
     */
    public function sendEmail($user, $type): void
    {
        Notification::send($user, new SendEmailToUserNotification($type));
    }

    /**
     * meyho
     * @param Request $request
     * @return mixed
     */
    public function getValue(Request $request)
    {
        return Notif::whereKey($request->type)->first()->value;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getUser(Request $request)
    {
        return User::find($request->user_id);
    }
}
