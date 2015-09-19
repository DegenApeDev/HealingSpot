<?php

namespace HealingSpot\Subcommands;

use Vavaballz\Core\Subcommands\Subcommand;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;

class ItemSubcommand extends Subcommand{

	public function execute($name, $sender, $args){
		$item = Item::get($args[0], 0, isset($args[2]) ? $args[2] : 1);
		$sender->getInventory()->addItem($item);
		$sender->sendMessage(TextFormat::DARK_RED . "You have given yourself " . $item->getCount() . " " . $item->getName());
	}

	public function minArgs(){
		return 1;
	}

	public function maxArgs(){
		return 2;
	}

	public function description(){
		return "Set a spot to heal a player";
	}

	public function usage(){
		return "item <itemid> [amount]";
	}
	public function onlyConsole(){
		return false;
	}
	public function onlyPlayer(){
		return true;
	}
    
}