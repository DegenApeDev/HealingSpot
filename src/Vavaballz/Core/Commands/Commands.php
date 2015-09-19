<?php

namespace HealingSpot\Core\Commands;

class Commands{

    private static $commands = [];

    public static function getCommand($name){
        if(isset(self::$commands[$name]) && !empty(self::$subcommands[$name]))
            return self::$commands[$name];
        else
            return false;
    }

    public static function executeCommand($name, $sender, $args){
        if(self::getSubcommand($name))
            return self::getSubcommand()->onCalled($name, $sender, $args);
        else
            return false;
    }

    public static function registerCommand($commands){
        if(is_subclass_of($commands, "Subcommand")){
            $sub[get_class($commands)] = $commands;
            array_push(self::$subcommands, $sub);
        }
    }
}