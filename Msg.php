<?php

class Msg
{
    public static $MSG_CATEGORY = array(
        'notification' => array(
            'title' => 'Open category',
            'body' => 'open category by click on push',
            'sound' => 'default',
            'badge' => 1
        ),
        'data' => array(
            'category' => 'Sports'
        ),
        "android" => array(
            "priority" => "high"
        )
    );

    public static $MSG_FEED = array(
        'notification' => array(
            'title' => 'New article 2',
            'body' => 'open article by click on push 2',
            'sound' => 'default',
            'badge' => 1
        ),
        'data' => array(
            'feedId' => '24_7d7f3d72fe68168268744535ba81df48'
        ),
        "android" => array(
            "priority" => "high"
        )
    );

    public static $MSG_SOURCE = array(
        'notification' => array(
            'title' => 'New article',
            'body' => 'open article by click on push',
            'sound' => 'default',
            'badge' => 1
        ),
        'data' => array(
            'source' => 'https://www.thesundaily.my/home/bayern-star-coman-signs-contract-extension-until-2027-IE8754965'
        ),
        "android" => array(
            "priority" => "high"
        )
    );

    public static $MSG_URL = array(
        'notification' => array(
            'title' => 'An elderly woman is the island\'s',
            'body' => 'latest murder victim. She is 72-year-old Shirley Rogers of no fixed place of abode.',
            'sound' => 'default',
            'badge' => 1,
            //'android_channel_id' => 'PUSH_NOTIFICATION_TECNAVIA_SILENT_CHANNEL'
        ),
        'data' => array(
            'url' => 'https://www.staradvertiser.com/test-interstitial.html?google_preview=dWmxUX0AhcQYx4HBkwYwx532mgaIAYCAgOCYz5nQGA&iu=5136785&gdfp_req=1&lineItemId=5990496708&creativeId=138389585290'
        ),
        "android" => array(
            "priority" => "high"
        )
    );

    public static $MSG_SIMPLE = array(
        'notification' => array(
            'title' => 'Hi Mary',
            'body' => 'This is a push notifications test, let me know if you received it',
            'badge' => 1,
            "content-available" => true,
            'android_channel_id' => 'PUSH_NOTIFICATION_TECNAVIA_SILENT_CHANNEL'
        ),
        "android" => array(
            "priority" => "high"
        )
    );
}
