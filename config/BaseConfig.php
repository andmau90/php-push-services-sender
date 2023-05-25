<?php

abstract class BaseConfig
{

    private $mRegistrationIds = array();
    private $mMsg = array();
    private $mSchedulePushResult;

    //Force Extending class to define this method
    abstract protected function send($msg, $registrationIds);

    public function schedulePush()
    {
        $this->mSchedulePushResult = $this->send($this->getMsg(), $this->getRegistrationIds());
        echo $this->mSchedulePushResult;
    }

    public function setRegistrationIds($registrationIds = array())
    {
        $this->mRegistrationIds = $registrationIds;
    }

    public function getRegistrationIds()
    {
        return $this->mRegistrationIds;
    }

    public function getSchedulePushResult()
    {
        return $this->mSchedulePushResult;
    }

    public function getMsg()
    {
        return $this->mMsg;
    }

    public function setMsg($msg = array())
    {
        $this->mMsg = $msg;
    }

    protected function curl($url, $headers, $fields)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
