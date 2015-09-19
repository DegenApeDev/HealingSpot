<?php

namespace Vavaballz\Core\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Vavaballz\Core\Subcommands\Subcommands;

class MainCommand extends Command{

    public function execute(CommandSender $sender, $commandLabel, array $args) {
    	if(count($args) == 0)
    		return false;
    	else{
	    	$subcommand = $args[0];
	    	$arguments = $args;
	    	array_shift($arguments);
    		Subcommands::execute($subcommand, $sender, $arguments);
    	}
    }
}