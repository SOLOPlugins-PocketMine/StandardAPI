<?php

namespace solo\standardapi;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\level\Location;
use pocketmine\level\Position;

use solo\standardapi\event\block\BlockModifyEvent;
use solo\standardapi\event\player\PlayerFloorMoveEvent;

class EventListener implements Listener{

	private $movePos = [];
	
	public function onPlayerCreation(PlayerCreationEvent $event){
		$event->setPlayerClass(StandardPlayer::class);
	}
	
	public function onMove(PlayerMoveEvent $event){
		$player = $event->getPlayer();
		$name = strtolower($player->getName());
		
		$currentPos = new Position($player->getFloorX(), $player->getFloorY(), $player->getFloorZ());
		
		if(isset($this->movePos[$name])){
			$oldPos = $this->movePos[$name];
			if($currentPos->x != $oldPos->x || $currentPos->y != $oldPos->y || $currentPos->z != $oldPos->z){
				$ev = new PlayerFloorMoveEvent($player, $oldPos, $currentPos);
				Server::getInstance()->getPluginManager()->callEvent($ev);
				if(! $ev->isCancelled()){
					$this->movePos[$name] = $currentPos;
				}else{
					$event->setTo(new Location($oldPos->x + 0.5, $oldPos->y, $oldPos->z + 0.5, $event->getTo()->getYaw(), $event->getTo()->getPitch(), $event->getTo()->getLevel()));
				}
			}
		}else{
			$this->movePos[$name] = $currentPos;
		}
	}
	
	public function onBlockPlace(BlockPlaceEvent $event){
		$ev = new BlockModifyEvent($event->getPlayer(), $event->getBlock(), $event->getItem());
		Server::getInstance()->getPluginManager()->callEvent($ev);
		if($ev->isCancelled()){
			$event->setCancelled();
		}
	}
	
	public function onBlockBreak(BlockBreakEvent $event){
		$ev = new BlockModifyEvent($event->getPlayer(), $event->getBlock(), $event->getItem());
		Server::getInstance()->getPluginManager()->callEvent($ev);
		if($ev->isCancelled()){
			$event->setCancelled();
		}
	}
	
	public function onInteract(PlayerInteractEvent $event){
		$ev = new BlockModifyEvent($event->getPlayer(), $event->getBlock(), $event->getItem());
		Server::getInstance()->getPluginManager()->callEvent($ev);
		if($ev->isCancelled()){
			$event->setCancelled();
		}
	}
	
	public function onQuit(PlayerQuitEvent $event){
		unset($this->movePos[strtolower($event->getPlayer()->getName())]);
	}
	
}