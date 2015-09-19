<?php

namespace Vavaballz\Core\Config;

class Config{
	
	public static $config = [];

	/**
	 * To load the config.json
	 * @param type $config_path 
	 * @return type
	 */
	public static function init($config_path){
		self::$config = json_decode(file_get_contents(dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . $config_path), true);
		echo json_last_error();
	}

	/**
	 * To get the subcommand namespace
	 * @return type
	 */
	public static function getSubcommandsPackage(){
		return trim(self::$config['subcommands_package'], DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
	}

	/**
	 * To get the main command
	 * @return type
	 */
	public static function getMainCommand(){
		return self::$config['main_command'];
	}

}