<?php
include_once __DIR__.'/../utils/envreader.php';
include_once 'BaseConfig.php';

class HcmConfig extends BaseConfig
{

    protected $clientId;
    protected $clientSecret;
    protected $appId;

    public function __construct()
    {
        $this->clientId = Env::hcm()["CLIENT_ID"];
        $this->clientSecret = Env::hcm()["CLIENT_SECRET"];
        $this->appId = Env::hcm()["APP_ID"];
    }

    private function retrieveApiKey()
    {
        $headers = array('Content-Type: application/x-www-form-urlencoded', 'Host: oauth-login.cloud.huawei.com');

        $fields =
            'grant_type=client_credentials&' .
            'client_id=' . $this->clientId . '&' .
            'client_secret=' . $this->clientSecret;

        $result = $this->curl('https://oauth-login.cloud.huawei.com/oauth2/v3/token', $headers, $fields);
        return json_decode($result, true)['access_token'];
    }

    protected function send($msg, $registrationIds)
    {
        $apiKey = $this->retrieveApiKey();
        if(isset($msg["data"])){
            $newData = array_merge($msg["data"], $msg["notification"]);
        } else {
            $newData = $msg["notification"];
        }

        $fields = array(
            "validate_only" => false,
            "message" => array(
                'token' => $registrationIds,
                "data" => json_encode($newData),
                /*"android" => array(
                    "notification" => array(
                        "foreground_show" => false
                    )
                )*/
            )
        );

        $headers = array(
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json'
        );

        return $this->curl("https://push-api.cloud.huawei.com/v1/{$this->appId}/messages:send", $headers, json_encode($fields));
    }
}
