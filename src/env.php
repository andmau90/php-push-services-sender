<?php

function get_argv_param($param, $df = NULL){
    global $argv;
    for ($i = 0; $i < count($argv); $i++) {
        if (str_starts_with($argv[$i], $param)) {
            return explode("=",$argv[$i])[1];;
        }
    }
    return $df;
} 

class Env{
    private static $env = NULL;

    public static function getMsgPath(){
        return get_argv_param("--msg", "msg.json");
    }

    public static function getService(){
        return get_argv_param("--service", "fcm");
    }

    private static function getEnvPath(){
        return get_argv_param("--env", ".env");
    }

    
    private static function getEnv(){
        if(!isset($env)){
            $env = parse_ini_file(__DIR__."/../".Env::getEnvPath(), true);
        }
        return $env;
    }

    private static function getModule($key){
        if(isset(Env::getEnv()[$key])){
            return Env::getEnv()[$key];
        }
        return array();
    }

    public static function getIds(){
        return Env::getModule("tokens")["DEVICES"];
    }

    public static function fcm(){
        return Env::getModule("fcm");
    }

    public static function hcm(){
        return Env::getModule("hcm");
    }

    public static function adm(){
        return Env::getModule("adm");
    }

    public static function apns(){
        return Env::getModule("apns");
    }

    public static function mas(){
        return Env::getModule("mas");
    }
}
