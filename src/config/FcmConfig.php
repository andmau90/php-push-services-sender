<?php

require_once 'BaseConfig.php';

class FcmConfig extends BaseConfig
{
    private $apiKey = "";
    
    public function __construct()
    {
        $this->apiKey = Env::fcm()["API_KEY"];
    }

    protected function send($msg, $registrationIds)
    {
        $fields = array_merge(
            array(
                'registration_ids' => $registrationIds
            ),
            $msg
        );

        $headers = array(
            'Authorization: key=' . $this->apiKey,
            'Content-Type: application/json'
        );

        return $this->curl('https://fcm.googleapis.com/fcm/send', $headers, json_encode($fields));
    }
}
