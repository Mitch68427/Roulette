<?php
namespace Mitch68427\Roulette;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class rltCommands implements Listener {
  var $colour
  var $amount
    
  public function __construct($colour, $amount) {
    $this->colour = $colour;
    $this->amount = $amount;
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args): bool {
    switch ($cmd->getName()) { 
      case "rlt":
        if (!isset($args[0])) { // colour
      			  $sender->sendMessage("USAGE: /rlt colour amount");
       				 return false;
    				}
    		   if (!isset($args[1])) { // amount
       			 $sender->sendMessage("USAGE: /rlt $args[0] amount");
        			return false;
   				 }
        $command = new rltCommand($args[0], $args[1]);
        $this->getColour($args[0], $args[1]);
        $this->getAmount($args[0], $args[1]);
      break;
    }
  }
  
  public function getColour($colour, $amount) {
    $obj = new rltCommand($colour, $amount);
    return $obj->colour;
  }
  
  public function getAmount($colour, $amount) {
   $obj = new rltCommand($colour, $amount);
    return $obj->amount;
  }
}

