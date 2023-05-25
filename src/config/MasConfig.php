<?php

require_once 'BaseConfig.php';

class MasConfig extends BaseConfig
{
    private $apiKey = "";
    
    public function __construct()
    {
        $this->apiKey = Env::mas()["API_KEY"];
    }

    protected function send($msg, $registrationIds)
    {
        if(isset($msg["data"])){
            $data = array_merge($msg["data"], $msg["notification"]);
        } else {
            $data = $msg["notification"];
        }
        $fields = array_merge(
            array(
                'registration_ids' => $registrationIds
            ),
            array(
                "data" => $data
            )
        );

        $headers = array(
            'Authorization: key=' . $this->apiKey,
            'Content-Type: application/json'
        );

        return $this->curl('https://fcm.googleapis.com/fcm/send', $headers, json_encode($fields));
    }
}
