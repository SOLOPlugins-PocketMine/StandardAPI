<?php

namespace solo\standardapi\message;

class CommandPage extends MessageFormat{

	public static $format;
	public static $descriptionFormat;

	public static function setFormat($format){
		self::$format = $format;
	}

	public static function setDescriptionFormat($format){
		self::$descriptionFormat = $format;
	}



	public $title;
	public $page;
	public $maxPage;

	public function __construct($title, array $commands = [], int $page = 1, int $maxPage = 1){
		$this->title = $title;
		$this->text = $commands;
		$this->page = $page;
		$this->maxPage = $maxPage;
	}



	public function getText(){
		$msg = str_replace(["{TITLE}", "{PAGE}", "{MAXPAGE}"], [$this->title, $this->page, $this->maxPage], self::$format) . "§r";
		foreach($this->text as $command => $desc){
			$msg .= "\n" . str_replace(["{COMMAND}", "{DESCRIPTION}"], [$command, $desc], self::$descriptionFormat) . "§r";
		}
		return $msg;
	}

	public function __toSimpleString(){
		return self::$popupColor . $this->getText();
	}
}