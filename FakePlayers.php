<?php

namespace FakePlayers;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\server\QueryRegenerateEvent;

class FakePlayers extends PluginBase implements Listener{

public function onEnable(){
$this->getLogger()->notice("FakePlayers plugin made by RexRed");
$this->getServer()->getPluginManager()->registerEvents($this, $this);

}

public function onQuery(QueryRegenerateEvent $e){
$e->setPlayerCount(mt_rand(5,1000));
}

}
