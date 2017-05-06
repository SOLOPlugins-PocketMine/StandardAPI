<?php

namespace solo\standardapi\message;

class Info extends MessageFormat{

	public static $format;

	public static function setFormat($format){
		self::$format = $format;
	}



	public $title;

	public function __construct($title, array $texts = []){
		$this->title = $title;
		$this->text = $texts;
	}



	public function getText(){
		$msg = str_replace("{TITLE}", $this->title, self::$format) . "§r";
		foreach($this->text as $t){
			$msg .= "\n" . $t . "§r";
		}
		return $msg;
	}

	public function __toSimpleString(){
		return self::$popupColor . $this->getText();
	}
}