<?php
require_once __DIR__."/../apns/Client.php";
require_once __DIR__."/../apns/Notification.php";
require_once __DIR__."/../apns/Payload.php";
require_once __DIR__."/../apns/Response.php";

class ApnsConfig extends BaseConfig {
	private $topic = "";
	private $certFilePass = "";
	private $certFilePath = "";

	public function __construct()
    {
        $this->$topic = Env::apns()["TOPIC"];
        $this->$certFilePath = Env::apns()["CERT_PATH"];
		$this->$certFilePass = Env::apns()["CERT_PASSWORD"];
    }

	protected function send($msg, $registrationIds)
    {
		$payload = new Payload();
		$payload->setAlert(
			array(
				"title" => $msg["notification"]["title"],
				"body" => $msg["notification"]["body"]
			)
		);
		$payload->setUrlArgs(Env::apns()["PARAMS"]);

		$apnsClient = new Client(true, $this->topic, $this->certFilePath, $this->certFilePass);
		for($i = 0; $i < count($registrationIds); $i++){
			$apnsClient->addNotification(new Notification($payload, $registrationIds[$i]));
		}
		$responses = $apnsClient->push();
		foreach($responses as $response) {
			$response->printResponse();
		}

        return "";
    }
}
