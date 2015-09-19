<?php

namespace HealingSpot;

use pocketmine\plugin\PluginBase;
use Vavaballz\Core\Commands\MainCommand;
use Vavaballz\Core\Subcommands\Subcommands;
use Vavaballz\Core\Config\Config;
use HealingSpot\Subcommands\ItemSubcommand;

class HealingSpot extends PluginBase{

    /**
     * On loading the plugin
     * @return type
     */
    public function onLoad(){
            $this->getLogger()->info("Loading ...");
            Config::init("HealingSpot\\Config.json");
            $this->getServer()->getCommandMap()->register("hs", new MainCommand("hs"));
            Subcommands::register("item", new ItemSubcommand());
            $this->getLogger()->info("is now loaded");
	}

    /**
     * On enabling the plugin
     * @return type
     */
    public function onEnable(){
            $this->getLogger()->info("is now enabled");
    }

    /**
     * On disabling the plugin
     * @return type
     */
    public function onDisable(){
            $this->getLogger()->info("is now disabled");
    }
}