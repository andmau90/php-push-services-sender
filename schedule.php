<?php

include 'Sender.php';

/*
 * before update the IDS class values
 * put the registration ids inside REG_IDS array
 * remember that this array could contains id for gcm, fcm and adm and if you send the push by firebase the ids about the other services will fail
 * 
 * command
 * php schedule.php adm|fcm|mas|hcm feed|url|category|simple|source prod|dev
 * 
 * adm => Amazon Device Messaging
 * fcm => Firebase Cloud Messaging|Default
 * mas => Firebase Cloud Messaging
 * hcm => Huawei cloud messaging
 * 
 * feed     => open article with feedId equal to sent value
 * url      => open url in internal webview (xhttp should open in external browser)
 * category => open the app on the rss category
 * source   => open article with source equal to sent value
 * simple   => open newsmemory apps|default
 * 
 * this arg is just for firebase and is not mandatory
 * prod     => (use production firebase account)
 * dev      => (use debug firebase account)|default, is a link to tecnavia demo app
 * 
 * if you send one of the following kind of pushes update Msg.php MSG constant
 *  - category => MSG_CATEGORY
 *  - feed     => MSG_FEED
 *  - url      => MSG_URL
 *  - source   => MSG_SOURCE
 *  - simple   => MSG_SIMPLE
 */
$sender = new Sender($argv);
$sender->send();
