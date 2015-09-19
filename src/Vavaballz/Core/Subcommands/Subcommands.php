<?php

namespace Vavaballz\Core\Subcommands;

use Vavaballz\Core\Config\Config;
use pocketmine\Player;

class Subcommands{

    private static $subcommands = [];

    /**
     * To get a subcommand instance
     * @param type $name 
     * @return type
     */
    public static function get($name){
        if(isset(self::$subcommands[$name]) && !empty(self::$subcommands[$name]))
            return self::$subcommands[$name];
        else
            return null;
    }

    /**
     * To execute a subcommand
     * @param type $name 
     * @param type $sender 
     * @param type $args 
     * @return type
     */
    public static function execute($name, $sender, $args){
        $subcommand = self::get($name);
        if(!is_null($subcommand)){
            if($subcommand->onlyConsole() && $sender instanceof Player){
                $sender->sendMessage("Only console can execute this command");
                return true;
            }else if($subcommand->onlyPlayer() && !$sender instanceof Player){
                $sender->sendMessage("Only player can execute this command");
                return true;
            }
            if(count($args) <= $subcommand->maxArgs() && count($args) >= $subcommand->minArgs())
                $subcommand->execute($name, $sender, $args);
            else
                $sender->sendMessage("/" . Config::getMainCommand() . " " . $subcommand->usage());
            return true;
        }else
            return false;
    }

    /**
     * To register a subcommand
     * @param type $name 
     * @param type $subcommand 
     * @return type
     */
    public static function register($name, $subcommand){
        if(is_subclass_of($subcommand, __NAMESPACE__ . "\\Subcommand")){
            self::$subcommands[$name] = $subcommand;
        }
    }
}