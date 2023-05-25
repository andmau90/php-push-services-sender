<?php

class Env{
    private static $env = NULL;

    private static function getEnvPath(){
        global $argv;
        for ($i = 0; $i < count($argv); $i++) {
            if (str_starts_with($argv[$i], "--env")) {
                return __DIR__."/../". explode("=",$argv[$i])[1];
            }
        }
        return __DIR__."/../.env.local";
    }

    
    private static function getEnv(){
        if(!isset($env)){
            $env = parse_ini_file(Env::getEnvPath(), true);
        }
        return $env;
    }

    private static function getModule($key){
        if(isset(Env::getEnv()[$key])){
            return Env::getEnv()[$key];
        }
        return array();
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
