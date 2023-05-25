<?php

class IDS
{
    public function getRegIds($service)
    {
        switch ($service) {
            case STR_HCM_SERVICE:
                return array(
                    "KAAAAACy0qFQAABCT5hrrZqIDfRzp4anOxVpwxnZ9yJan4gx6bHe813kBHkF0tG-5xPBPHKxHoIdyLrMbp_2Y0y6Xl7xpc3db4-m55KHvU-TvDX3tg"
                );
            case STR_ADM_SERVICE:
                return array(
                    'amzn1.adm-registration.v3.Y29tLmFtYXpvbi5EZXZpY2VNZXNzYWdpbmcuUmVnaXN0cmF0aW9uSWRFbmNyeXB0aW9uS2V5ITEhZHJ0NWs2dk9hdTZCYmk0RFM2VVh2T0RlVnAyOWlmV1pqY1lVbGhyeXI1TlBIaGgwWENiellIbUJ2dS9NS29hQlNzOFlGQVFRMFBwOU1FVEd6OGovWSt5QXdCdW83WnNlRTlXOFVNQk93a2pnQnJvSHBzZHRSaDc3cmw2Q1luVzVjaDQwYlhVQkVWUThORUdxNUd5ZG5DbkRwVWUzT3lrbHZIUERaSTloZHFJQWczdG5WR2hzeTk5MnZBT04veFBGaEpiRzVaZ0Y1VTFiK05wb3EyRFVtRDdVV3dRRkNUQTVBSzVoejNPcGNxZm1YbHhuVEJNSjAzMSs0dDQ0MHFGRWRUVWh0S2FMc2w2UWtKRVBQS0JDemhWV1NuSllQTUludlJYY01oNjkxRFpYemdSRFhuNHdDaTJCbEg4cDFjSjEvTjdNZzluTWQ5YTFCaElHZmtsOEhrYkNYVGJxTlJvZ0tDbm03UThOWTJVPSFCd2xCUEFWSHVoMk1BOHRUVWhHQ0ZRPT0'
                );
            case STR_WEB_SERVICE:
                return array(
                    //"dzOcaC3Hlfyr6zgaqmEdi2:APA91bFbscGdkSPrGifZIl0pjwvo0zODeqUl0FZ-iVehCYBpGx4IKMYRTqah8emuV33_Z4kbwXnLRjx8NnPbwEYGFjhIjTGOyGy2c3IxYeYjdvvbPiEOko97LNinVp9TEJkgDu7Qw0No"
                    "eUEeADOtTCy6lbppjqQ3kq:APA91bHeznwfwTheBthlSU3uU-pGOOkOrphw0sFBfEi0wIqCcei1y1Fht6evJL9fMT51eix_GE9ZZ0FBEFswhMuTYKJOYXwaiOeLbYm3n7ANLklgDgspNTvMNsLUl4xdN-BYT5jPDEat"
                );
            case STR_FCM_SERVICE:
                return array(
                    "fzKZh9IlTdK_40Bpoto6JS%3AAPA91bE-lnKEMdyedCeyYa13khBaWccF6nNC-WKZoW6qLj9YL0X14GmM233jDlKeTc8Brg_e51B_ay-CpHrsSIBZkNswhj8qPLOww2Grkqeo0BgwmLZ79chQP5jh7e7mCn1F1xwXzX8s"
                );
            case STR_MAS_SERVICE:
                return array(
                    "eTsqgWw5StiPyCoLJSQwR3:APA91bHKZ_igeD--lGyGHsf3KQJSovONlXvC6UPbanSjbg6No3h_YuIOBDDN8_arbbdg5VTmn56zbMOL7svldrxJFaPUl0Ii757xhhhS_pzM7w3RfK24knbyFw8A6upZwedFzkoZrNCT"
                );
            case STR_APNS_SERVICE:
                return array(
                    "4D9C29FD1A3103EE2F9F74FC85EC37445199911F29A5F3359E91CE0F0FE9DF29"
                );
            default:
                return array();
        }
    }
}
