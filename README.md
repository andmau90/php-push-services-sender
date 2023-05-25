# PushNotificationSender

this repository help to send a push notification on specific devices with the following services:

-   ADM (Amazon Device Messaging)
-   HCM (Huawei Cloud Messaging)
-   FCM (Firebase Cloud Messaging)
-   MAS (based on Firebase Cloud Messaging)
-   APNS2

## Configuration

add settings to .env under service that you need to test

## Run

```
php schedule.php --service=fcm|web|adm|hcm|mas|apns --env=PATH_TO_FILE --msg=PATH_TO_JSON
```

if --env is not specified the script use `.env`
if --msg is not specified the script use `msg.json`
if --service is not set default will be fcm
