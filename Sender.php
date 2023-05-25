<?php

include 'IDS.php';
include 'Msg.php';
include 'Configurator.php';
include 'config/FcmConfig.php';
include 'config/AdmConfig.php';
include 'config/HcmConfig.php';
include 'config/MasConfig.php';
include 'config/WebConfig.php';
include 'config/ApnsConfig.php';

class Sender
{
    private $command;
    private $sender;
    private $ids;

    function __construct($params)
    {
        $this->command = $params;
        $this->ids = new IDS();
    }

    private function getMsg($mMsgType)
    {
        switch ($mMsgType) {
            case 'category':
                return Msg::$MSG_CATEGORY;
            case 'feed':
                return Msg::$MSG_FEED;
            case 'source':
                return Msg::$MSG_SOURCE;
            case 'url':
                return Msg::$MSG_URL;
            default:
                return Msg::$MSG_SIMPLE;
        }
    }

    private function initAmazonSender()
    {
        $this->sender = new AdmConfig();
    }

    private function initHuaweiSender()
    {
        $this->sender = new HcmConfig();
    }

    private function initFirebaseSender()
    {
        /*
         * check if the app is registered in firebase console
         */
        $this->sender = new FcmConfig();
    }

    private function initMasSender()
    {
        /*
         * check if the app is registered in firebase console
         */
        $this->sender = new MasConfig();
    }

    private function initWebSender()
    {
        /*
         * check if the app is registered in firebase console
         */
        $this->sender = new WebConfig();
    }

    private function initApnsSender(){
        $this->sender = new ApnsConfig();
    }

    private function initSender()
    {
        $service = Configurator::getService($this->command);
        switch ($service) {
            case STR_HCM_SERVICE:
                $this->initHuaweiSender();
                break;
            case STR_ADM_SERVICE:
                //provided by the app, you che see the value inside Log (search ADM)
                $this->initAmazonSender();
                break;
            case STR_MAS_SERVICE:
                $this->initMasSender();
                break;
            case STR_WEB_SERVICE:
                $this->initWebSender();
                break;
            case STR_APNS_SERVICE:
                $this->initApnsSender();
                break;
            default:
                //provided by the app, you che see the value inside Log (search FCM)
                $this->initFirebaseSender();
        }
        $this->sender->setRegistrationIds($this->ids->getRegIds($service));
        $this->sender->setMsg($this->getMsg(Configurator::getMsgType($this->command)));
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
