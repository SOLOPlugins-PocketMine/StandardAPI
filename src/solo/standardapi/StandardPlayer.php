<?php

namespace solo\standardapi;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\network\mcpe\protocol\LoginPacket;

use solo\standardapi\message\MessageFormat;

class StandardPlayer extends Player{

	public $deviceOperatingSystem;
	public $deviceModel;

	public function handleLogin(LoginPacket $packet) : bool{
		if($this->loggedIn){
			return false;
		}
		$this->deviceModel = $packet->clientData["DeviceModel"] ?? "Unknown";
		switch($packet->clientData["DeviceOS"] ?? 0){
			case 1: $this->deviceOperatingSystem = "Android"; break;
			case 2: $this->deviceOperatingSystem = "IOS"; break;
			case 3: $this->deviceOperatingSystem = "Fire OS"; break;
			case 4: $this->deviceOperatingSystem = "Gear VR"; break;
			case 5: $this->deviceOperatingSystem = "Apple TV"; break;
			case 6: $this->deviceOperatingSystem = "Fire TV"; break;
			case 7: $this->deviceOperatingSystem = "Windows 10"; break;
			default: $this->deviceOperatingSystem = "Unknown";
		}

		return parent::handleLogin($packet);
	}

	//public function sendMessage($message){
	//	if($message instanceof MessageFormat){
	//		$message = $message->__toString();
	//	}
	//	parent::sendMessage($message);
	//}

	public function sendTip($message){
		if($message instanceof MessageFormat){
			$message = $message->__toSimpleString();
		}
		parent::sendTip($message);
	}

	public function sendPopup($message, $subtitle = ''){
		if($message instanceof MessageFormat){
			$message = $message->__toSimpleString();
		}
		parent::sendPopup($message, $subtitle);
	}

	public function getOperatingSystem(){
		return $this->deviceOperatingSystem;
	}

	public function getDeviceModel(){
		return $this->deviceModel;
	}
}