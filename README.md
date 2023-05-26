# PushNotificationSender

this repository help to send a push notification on specific devices with the following services:

-   ADM (Amazon Device Messaging)
-   HCM (Huawei Cloud Messaging)
-   FCM (Firebase Cloud Messaging)
-   MAS (based on Firebase Cloud Messaging)
-   APNS2 (Safari push notification)

## Configuration

edit .env file with service settings and device token

```
[service]
KEY="VALUE"

[tokens]
DEVICES[]="VALUE1"
...
DEVICES[]="VALUEn"
```

### APNS2

-   PHP >= 5.5.24
-   curl >= 7.46.0 (with http/2 support enabled)
-   openssl >= 1.0.2e
-   curl with http2 support (nghttp2)

## Run

```
php index.php --service=fcm|adm|hcm|mas|apns --env=FILE_NAME --msg=PATH_TO_JSON
```

if --env filename if it is not specified the script use `.env`
if --msg filename, if it is not specified the script use `msg.json`
if --service if it is not set default will be fcm
