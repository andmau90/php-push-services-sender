<?php

include_once __DIR__.'/../utils/envreader.php';
include_once 'BaseConfig.php';

class FcmConfig extends BaseConfig
{
    protected function send($msg, $registrationIds)
    {
        $apiKey = Env::fcm()["API_KEY"];
        $fields = array_merge(
            array(
                'registration_ids' => $registrationIds
            ),
            $msg
        );

        $headers = array(
            'Authorization: key=' . $apiKey,
            'Content-Type: application/json'
        );

        return $this->curl('https://fcm.googleapis.com/fcm/send', $headers, json_encode($fields));
    }
}
