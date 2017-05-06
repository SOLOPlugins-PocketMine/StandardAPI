<?php

namespace solo\standardapi\event\player;

use pocketmine\Player;
use pocketmine\event\Cancellable;
use pocketmine\event\player\PlayerEvent;
use pocketmine\level\Position;

class PlayerFloorMoveEvent extends PlayerEvent implements Cancellable{
	
    public static $handlerList = null;

    /** @var Position */
    private $from;
    /** @var Position */
    private $to;

    /**
     * 
     * @param Player $player
     * @param Position $from
     * @param Position $to
     */
    public function __construct(Player $player, Position $from, Position $to){
        $this->player = $player;
        $this->from = $from;
        $this->to = $to;
    }

    public function getFrom() : Position{
        return $this->from;
    }

    public function setFrom(Position $from)/* : void */{
        $this->from = $from;
    }

    public function getTo() : Position{
        return $this->to;
    }

    public function setTo(Position $to)/* : void */{
        $this->to = $to;
    }
}