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
        if ($this->validation($request)) {
            return $this->validationMessage();
        }
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
        return User::whereCode($request->user_id)->first();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function validation(Request $request): bool
    {
        return $request->user_id == null || $request->type == null;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function validationMessage(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => 'user ',
            'message' => 'user or type is incorrect',
        ], 404);
    }



    public function storeWithFireBase(Request $request)
    {

//        $target,$message,$title
//        dd($message);
        $target = $request->target;
        $message = $request->message;
        $title = $request->message;
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

        $extraNotificationData = [
            'message' => '$message',
            'title' => '$title',
            'subtitle' => 'یک پیام جدید',
            'title_app' => 0,
            'img' => '0',
            'tickerText' => '$title',
            'notices' => true,
            'vibrate' => 1,
            'sound' => 1,
            'class_id' => 'none',
            'link' => '0',
            'largeIcon' => 'large_icon',
            'smallIcon' => 'small_icon',
            'app_name' => 'com.xtco.ftech',
        ];


        $fcmNotification = [
            //'to' => $target , // ارسال برای همه
            'registration_ids' => [1, 1000], //[ارایه ای از توکن ها]
            //'notification' => $notification,
            'data' => $extraNotificationData,
            "priority" => "high",
            "time_to_live" => 86000
        ];

        $key = "AAAAWrZBSc8:APA91bGPLfalgB_Wb3JGAmfyrFvIbviKx1Hw8958plOG457Q-y4ltoE5ye9vycoe-gsbM2C59cUFtxHPLPKvMTiF_nRwRIpb6asjA52pjkvP5gY9GeNO06ITDMxJIioLM4YPpj7q4R8q";

        $headers = array(
            'Authorization: key=' . $key,
            'Content-Type: application/json'
        );


        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarily
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));

        // Execute post
        $result = curl_exec($ch);
        dd($result);
        //var_dump($result);
        // Close connection
        curl_close($ch);

    }
}
