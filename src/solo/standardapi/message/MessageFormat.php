<?php

namespace solo\standardapi\message;

use pocketmine\event\TextContainer;
use pocketmine\utils\Config;
use solo\standardapi\StandardAPI;

abstract class MessageFormat extends TextContainer{

	public static function init(){
		$config = new Config(StandardAPI::getInstance()->getDataFolder() . ".yml", Config::YAML, [
			"notify-prefix" => "§b§l[ 알림 ]",
			"notify-text-color" => "§7",
			"notify-popup-color" => "§b",
			
			"alert-prefix" => "§c§l[ 알림 ]",
			"alert-text-color" => "§r§7",
			"alert-popup-color" => "§c",
			
			"usage-prefix" => "§d§l[ 사용법 ]",
			"usage-text-color" => "§r§7",
			"usage-popup-color" => "§d",
			
			"info-title-format" => "§l======< §b{TITLE} §r§l>======",
			"page-title-format" => "§l======< {TITLE} §r§l(전체 {MAXPAGE}페이지 중 {PAGE}페이지) >======",
			
			"command-page-description-format" => "§2§l{COMMAND} §r§7- {DESCRIPTION}"
		]);

		Notify::setPrefix($config->get("notify-prefix"));
		Notify::setTextColor($config->get("notify-text-color"));
		Notify::setPopupColor($config->get("notify-popup-color"));

		Alert::setPrefix($config->get("alert-prefix"));
		Alert::setTextColor($config->get("alert-text-color"));
		Alert::setPopupColor($config->get("alert-popup-color"));

		Usage::setPrefix($config->get("usage-prefix"));
		Usage::setTextColor($config->get("usage-text-color"));
		Usage::setPopupColor($config->get("usage-popup-color"));

		Info::setFormat($config->get("info-title-format"));
		Page::setFormat($config->get("page-title-format"));

		CommandPage::setFormat($config->get("page-title-format"));
		CommandPage::setDescriptionFormat($config->get("command-page-description-format"));
	}





	public function __construct($text){
		$this->text = $text;
	}

	public function getRawText(){
		return $this->text;
	}

	public function getText(){
		return $this->text;
	}

	abstract public function __toSimpleString();
}