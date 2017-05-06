<?php

namespace solo\standardapi\message;

class Page extends MessageFormat{

	public static $format;

	public static function setFormat($format){
		self::$format = $format;
	}



	public $title;
	public $page;
	public $maxPage;

	public function __construct($title, array $texts = [], int $page = 1, int $maxPage = 1){
		$this->title = $title;
		$this->text = $texts;
		$this->page = $page;
		$this->maxPage = $maxPage;
	}



	public function getText(){
		$msg = str_replace(["{TITLE}", "{PAGE}", "{MAXPAGE}"], [$this->title, $this->page, $this->maxPage], self::$format) . "§r";
		foreach($this->text as $t){
			$msg .= "\n" . $t . "§r";
		}
		return $msg;
	}

	public function __toSimpleString(){
		return self::$popupColor . $this->getText();
	}
}