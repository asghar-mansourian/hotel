<?php


namespace App\lib;


class currency
{
    private $from;
    private $to;
    private $currency;
    private $api;
    public function __construct()
    {
        $this->api = "ed2290c809msh2477a6c7261628ap1235b9jsnb825ee927482";
    }

    public  function  get($from , $to , $cur)
    {
        $this->from = $from;
        $this->to = $to;
        $this->currency = $cur;

        $curl = curl_init();
        $url = "https://rapidapi.p.rapidapi.com/convert/".$this->from."/".$this->to."/" . $this->currency;
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: currency26.p.rapidapi.com",
                "x-rapidapi-key: " . $this->api,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
