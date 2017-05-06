<?php

namespace solo\standardapi\message;

use pocketmine\command\Command;

class Usage extends MessageFormat{

	public static $prefix;
	public static $textColor;
	public static $popupColor;

	public static function setPrefix($prefix){
		self::$prefix = $prefix;
	}

	public static function setTextColor($color){
		self::$textColor = $color;
	}

	public static function setPopupColor($color){
		self::$popupColor = $color;
	}



	public function __construct($message){
		if($message instanceof Command){
			$message = $message->getUsage();
		}
		parent::__construct($message);
	}

	public function getText(){
		return (self::$prefix === "" ? "" : self::$prefix . " " . "§r") . self::$textColor . $this->text;
	}

	public function __toSimpleString(){
		return (self::$prefix === "" ? "" : self::$prefix . " " . "§r") . self::$popupColor . $this->text;
	}
}