<?php

require_once 'config/FcmConfig.php';
require_once 'config/AdmConfig.php';
require_once 'config/HcmConfig.php';
require_once 'config/MasConfig.php';
require_once 'config/WebConfig.php';
require_once 'config/ApnsConfig.php';
require_once 'env.php';

class Sender
{
    private $sender;
    
    function __construct()
    {
    }

    private function initSender()
    {
        $service = Env::getService();
        switch ($service) {
            case "hcm":
                $this->sender = new HcmConfig();
                break;
            case "adm":
                //provided by the app, you che see the value inside Log (search ADM)
                $this->sender = new AdmConfig();
                break;
            case "mas":
                $this->sender = new MasConfig();
                break;
            case "web":
                $this->sender = new WebConfig();
                break;
            case "apns":
                $this->sender = new ApnsConfig();
                break;
            default:
                //provided by the app, you che see the value inside Log (search FCM)
                 $this->sender = new FcmConfig();
        }
        $this->sender->setRegistrationIds(Env::getIds());
        $this->sender->setMsg($this->getMsg());
    }

    private function getMsg()
    {
        global $argv;
        $json = file_get_contents(Env::getMsgPath());
        // Decode the JSON file
        return json_decode($json,true);
    }

    private function schedulePush()
    {
        $this->printContent();
        /**
         * You can see the push content received by the device if you search inside log
         * the following regex ^PUSH(_(adm|fcm|gcm))?$
         */
        $this->sender->schedulePush();
        $this->printResult();
    }

    public function send()
    {
        $this->initSender();
        $this->schedulePush();
    }

    public function printContent()
    {
        printf('%s=========================== CONTENT ===========================%s', PHP_EOL, PHP_EOL);
        printf('Registration Ids: %s', PHP_EOL);
        print_r($this->sender->getRegistrationIds());
        printf('Message: %s', PHP_EOL);
        print_r($this->sender->getMsg());
    }

    public function printResult()
    {
        printf('%s============================ RESULT ===========================%s', PHP_EOL, PHP_EOL);
        printf('Json response: %s', PHP_EOL);
        print_r(json_decode($this->sender->getSchedulePushResult(), true));
    }
}
