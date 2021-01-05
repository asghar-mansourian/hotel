<?php


namespace App\lib;


use Exception;

class sms
{
    const ERROR_EMPTY_ACCESS_POINT = 'Empty access point not allowed';
    const ERROR_EMPTY_API_LOGIN = 'Empty api login not allowed';
    const ERROR_EMPTY_API_PASSWORD = 'Empty api password not allowed';
    const ERROR_EMPTY_RESPONSE = 'errorEmptyResponse';
    const ERROR_EMPTY_SENDER = 'Empty sender not allowed';

    protected $_apiLogin = null;

    protected $_apiPassword = null;

    protected $_access_point = null;

    protected $_apiSender = null;

    protected $_packetSize = 200;

    protected $_results = array();

    public function __construct()
    {
        $this->_setAccessPoint(config('sms.api'));
        $this->_setApiLogin(config('sms.username'));
        $this->_setApiPassword(config('sms.password'));
        $this->_setApiSender(config('sms.sender'));
    }

    private function _setAccessPoint($access_point)
    {
        if (empty($access_point)) {
            throw new Exception(self::ERROR_EMPTY_ACCESS_POINT);
        }
        $this->_access_point = $access_point;
    }

    private function _setApiLogin($apiLogin)
    {
        if (empty($apiLogin)) {
            throw new Exception(self::ERROR_EMPTY_API_LOGIN);
        }
        $this->_apiLogin = $apiLogin;
    }

    private function _setApiPassword($apiPassword)
    {
        if (empty($apiPassword)) {
            throw new Exception(self::ERROR_EMPTY_API_PASSWORD);
        }
        $this->_apiPassword = $apiPassword;
    }

    private function _setApiSender($apiSender)
    {
        if (empty($apiSender)) {
            throw new Exception(self::ERROR_EMPTY_SENDER);
        }
        $this->_apiSender = $apiSender;
    }

    public function getAccessPoint()
    {
        return $this->_access_point;
    }

    private function _sendRequest($uri, $params = null)
    {
        $url = $this->_getUrl($uri);
        $data = $this->_formPacket($params);
        $client = curl_init($url);
        curl_setopt_array($client, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => array('Host: ' . explode('//', $this->getAccessPoint())[1]),
            CURLOPT_POSTFIELDS => $data,
            // CURLOPT_VERBOSE => true,
        ));

        $body = curl_exec($client);
        curl_close($client);
        if (empty($body)) {
            throw new Exception(self::ERROR_EMPTY_RESPONSE);
        }
        $decodedBody = json_decode($body, true);
        if (is_null($decodedBody)) {
            throw new Exception($body);
        }
        return $decodedBody;
    }

    private function _getUrl($uri)
    {

        return $this->getAccessPoint() . '/messages/v2/' . $uri . '.json';
    }

    private function _formPacket($params = null)
    {
        $params['login'] = $this->_apiLogin;
        $params['password'] = $this->_apiPassword;
        foreach ($params as $key => $value) {
            if (empty($value)) {
                unset($params[$key]);
            }
        }
        $packet = json_encode($params);
        return $packet;
    }

    public function getPacketSize()
    {
        return $this->_packetSize;
    }

    public function send($messages, $statusQueueName = null, $scheduleTime = null)
    {
        $params = array(
            'messages' => $messages,
            'statusQueueName' => $statusQueueName,
            'scheduleTime' => $scheduleTime,
        );
        return $this->_sendRequest('send', $params);
    }

    public function sendSingle($message, $number)
    {
        $messages = array(
            array(
                "clientId" => "1",
                "phone" => $number,
                "text" => $message,
                "sender" => $this->_apiSender
            ),
        );
        $this->send($messages);

    }

    // these bellow code  for linex site
    public function sendSmsWithLinex($body, $number)
    {
        $this->sendSingle($body, $number);
    }

    public function sendGroup($message, $numbers)
    {
        $messages = null;
        foreach ($numbers as $key => $number) {
            $messages[] = [
                "clientId" => $key+1,
                "phone" => $number,
                "text" => $message,
                "sender" => $this->_apiSender
            ];
        }
        $this->send($messages);
    }


    public function status($messages)
    {
        return $this->_sendRequest('status', array('messages' => $messages));
    }

    public function statusQueue($name, $limit)
    {
        return $this->_sendRequest('statusQueue', array(
            'statusQueueName' => $name,
            'statusQueueLimit' => $limit,
        ));
    }

    public function balance()
    {
        return $this->_sendRequest('balance');
    }

    public function senders()
    {
        return $this->_sendRequest('senders');
    }


}
