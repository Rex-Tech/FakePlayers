<?php

namespace FakePlayers;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\server\QueryRegenerateEvent;


class FakePlayers extends PluginBase implements Listener{

public function onEnable(){
$this->getLogger()->notice("FakePlayers plugin made by RexRed");
$this->getServer()->getPluginManager()->registerEvents($this, $this);

        $this->saveDefaultConfig();
		$this->reloadConfig();
}

public function onQuery(QueryRegenerateEvent $e){
$minPlayerCount = $this->getConfig()->get("min");
$maxPlayerCount = $this->getConfig()->get("max");
$e->setPlayerCount(mt_rand($minPlayerCount,$maxPlayerCount));
$Count = $e->getPlayerCount();
$this->getLogger()->notice("Update Player Count~\nNow PlayerCount : $Count");
}

}
