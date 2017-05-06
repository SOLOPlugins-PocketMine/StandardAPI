<?php

namespace solo\standardapi\message;

class Notify extends MessageFormat{

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



	public function getText(){
		return (self::$prefix === "" ? "" : self::$prefix . " " . "§r") . self::$textColor . $this->text;
	}

	public function __toSimpleString(){
		return self::$popupColor . $this->text;
	}
}