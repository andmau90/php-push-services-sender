<?php

define("STR_HCM_SERVICE", 'hcm');
define("STR_ADM_SERVICE", 'adm');
define("STR_FCM_SERVICE", 'fcm');
define("STR_MAS_SERVICE", 'mas');
define("STR_WEB_SERVICE", 'web');
define("STR_APNS_SERVICE", 'apns');

class Configurator
{

    private static $SERVICES = array(STR_FCM_SERVICE, STR_ADM_SERVICE, STR_MAS_SERVICE, STR_HCM_SERVICE, STR_WEB_SERVICE, STR_APNS_SERVICE);
    private static $TYPES = array('simple', 'category', 'feed', 'source', 'url');

    public static function getIsProd($argv)
    {
        return in_array('prod', $argv) ? true : false;
    }

    public static function isAndroid($argv)
    {
        return in_array('ios', $argv) ? false : true;
    }

    public static function getService($argv)
    {
        return Configurator::findTheSameItemBetweenArrays($argv, Configurator::$SERVICES);
    }

    public static function getMsgType($argv)
    {
        return Configurator::findTheSameItemBetweenArrays($argv, Configurator::$TYPES);
    }

    private static function findTheSameItemBetweenArrays($source, $base)
    {
        for ($i = 0; $i < count($source); $i++) {
            if (in_array($source[$i], $base)) {
                return $source[$i];
            }
        }
        return $base[0];
    }
}
