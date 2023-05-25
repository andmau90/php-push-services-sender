<?php

include_once __DIR__.'/../utils/envreader.php';
include_once 'BaseConfig.php';

class MasConfig extends BaseConfig
{
    protected function send($msg, $registrationIds)
    {
        $apiKey = Env::mas()["API_KEY"];
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
            'Authorization: key=' . $apiKey,
            'Content-Type: application/json'
        );

        return $this->curl('https://fcm.googleapis.com/fcm/send', $headers, json_encode($fields));
    }
}
