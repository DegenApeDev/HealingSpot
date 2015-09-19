<?php

namespace Vavaballz\Core\Subcommands;

abstract class Subcommand {

	abstract public function execute($name, $sender, $args);
	abstract public function minArgs();
	abstract public function maxArgs();
	abstract public function description();
	abstract public function usage();
	abstract public function onlyConsole();
	abstract public function onlyPlayer();

}