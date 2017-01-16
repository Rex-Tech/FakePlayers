<?php

namespace FakePlayers;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\untils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class FakePlayers extends PluginBase implements Listener{

public function onEnable(){
$this->getLogger()->notice("FakePlayers plugin made by RexRed & maintenanced by SuperXingKong");
$this->getServer()->getPluginManager()->registerEvents($this, $this);
@mkdir($this->getDataFolder(),0777,true);
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

public function onCommand(CommandSender $sender, Command $cmd, $label, array $arg){
if (strtolower($cmd->getName()) == 'smaxc'){
if (isset($arg[0])){
$this->getConfig()->set('max',"$arg[0]");
$this->getConfig()->save();
$sender->sendMessage("成功设置最大人数:$arg[0]");
return true;
}else{
$sender->sendMessage("缺少参数");
}
}
if (strtolower($cmd->getName()) == 'sminc'){
if (isset($arg[0])){
$this->getConfig()->set('min',"$arg[0]");
$this->getConfig()->save();
$sender->sendMessage("成功设置最小人数:$arg[0]");
return true;
}else{
$sender->sendMessage("缺少参数");
}
}
}

}
