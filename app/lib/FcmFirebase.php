<?php
/**
 * @author: Farhad Hassan Pour
 */

namespace App\lib;


class FcmFirebase
{

    private $key;

    /**
     * Fcm constructor.
     */
    function __construct()
    {
        $this->key = env('SERVER_KEY_FIREBASE');
    }

    /**
     * @param User $user
     * @param $requestData
     * @return array|bool|mixed
     */
    function sendToUser(User $user, $requestData)
    {
        $tokens = json_decode($user->fcm_tokens, true);
        if (!is_array($tokens)) {
            return false;
        }
        $raw_tokens = [];
        foreach ($tokens as $token) {
            $raw_tokens[] = $token['token'];
        }
        $requestData["registration_ids"] = $raw_tokens;
        $r = $this->request($requestData);

        if (isset($r["results"])) {
            foreach ($r["results"] as $key => $value) {
                if (isset($value["error"]) && $value["error"] == "NotRegistered") {
                    unset($tokens[$key]);
                }
            }
            $tokens = array_values($tokens);
            $user->update([
                'fcm_tokens' => json_encode($tokens)
            ]);
        }

        return $r;

    }

    /**
     * @param $requestData
     * @return int[]|mixed
     */
    private function request($requestData)
    {
        $ch = curl_init("https://fcm.googleapis.com/fcm/send");
        //in app, check if the request is from Host or One signal.
        $requestData["data"]["request_via"] = "sd_host";
        $requestData["notification"]["sound"] = "default";

        $data = json_encode($requestData);
        curl_setopt_array($ch, [
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Authorization: key=" . $this->key
            ],
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);

        $response = curl_exec($ch);
        $r = json_decode($response, true);
        if ($r == null) {
            $r = [
                "success" => 0,
                "failure" => 1
            ];
        }
        return $r;
    }

}
