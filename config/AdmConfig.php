<?php
require_once 'BaseConfig.php';

class AdmConfig extends BaseConfig
{
    //client id provided on Amazon Marketplace
    private $amazonClientId;
    //client secret provided on Amazon Marketplace
    private $amazonClientSecret;

    public function __construct()
    {
        $this->amazonClientId = Env::adm()["CLIENT_ID"];
        $this->amazonClientSecret = Env::adm()["CLIENT_SECRET"];
    }

    protected function send($msg, $registrationIds)
    {
        $apiKey = $this->retrieveApiKey();
        $headers = array(
            'X-Amzn-Type-Version: com.amazon.device.messaging.ADMMessage@1.0',
            'Accept: application/json',
            'X-Amzn-Accept-Type: com.amazon.device.messaging.ADMSendResult@1.0',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        );

        if(isset($msg["data"])){
            $data = array_merge($msg["data"], $msg["notification"]);
        } else {
            $data = $msg["notification"];
        }
        unset($data["badge"]);

        $fields = array(
            "data" => $data,
            "consolidationKey" => "news"
        );

        $count = count($registrationIds);
        $result = '[';
        for ($i = 0; $i < $count; $i++) {
            $result = $result . ($this->curl('https://api.amazon.com/messaging/registrations/' . $registrationIds[$i] . '/messages', $headers, json_encode($fields)));
            if ($i < $count - 1) {
                $result = $result . ',';
            }
        }
        return $result . ']';
    }

    private function retrieveApiKey()
    {
        $headers = array('Content-Type: application/x-www-form-urlencoded');

        $fields =
            'grant_type=client_credentials&' .
            'scope=messaging:push&' .
            'client_id=' . $this->amazonClientId . '&' .
            'client_secret=' . $this->amazonClientSecret;

        $result = $this->curl('https://api.amazon.com/auth/O2/token', $headers, $fields);
        var_dump($result);
        return json_decode($result, true)['access_token'];
    }
}
