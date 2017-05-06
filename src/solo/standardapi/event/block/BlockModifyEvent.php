<?php

namespace solo\standardapi\event\block;

use pocketmine\Player;
use pocketmine\event\Cancellable;
use pocketmine\event\block\BlockEvent;
use pocketmine\block\Block;
use pocketmine\item\Item;

class BlockModifyEvent extends BlockEvent implements Cancellable{
	
	public static $handlerList = null;
	
	protected $player;
	protected $block;
	protected $item;
	
	public function __construct(Player $player, Block $block, Item $item){
		$this->player = $player;
		$this->block = $block;
		$this->item = $item;
	}
	
	public function getPlayer() : Player{
		return $this->player;
	}
	
	public function getItem() : Item{
		return $this->item;
	}
}