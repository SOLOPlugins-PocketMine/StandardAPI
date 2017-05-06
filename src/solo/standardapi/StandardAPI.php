<?php

namespace solo\standardapi;

use pocketmine\plugin\PluginBase;

use solo\standardapi\message\MessageFormat;

class StandardAPI extends PluginBase{
	
	public static $instance;
	
	public static function getInstance(){
		return self::$instance;
	}
	
	public function onLoad(){
		self::$instance = $this;
		@mkdir($this->getDataFolder());

		MessageFormat::init();
	}
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
	}
}