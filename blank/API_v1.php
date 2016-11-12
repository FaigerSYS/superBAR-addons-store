<?php
# # # # # # # # # # # # # # #
# Author: FaigerSYS
# Descriprion: Blank addon (API v1)
# # # # # # # # # # # # # # #

# You can import another classes
#use pocketmine\Server;

# Fuction that runs once when addon loading
$onStart = function() {
	# String to replace in HUD format
	$string = '%BLANK%';
	
	# There you can write any data you want to use in $onExecute (one argument)
	#$this->createVariable = null;
	# You can also write there any class/plugin needed to addon works
	
	# Then retrun string
	return $string;
};

# Function that uses for HUD
$onExecute = function($player, $var) {
	# $player - player class
	# $var - variable that you defined in $onStart
	
	# Define output for HUD
	$out = 'Hello, ' . $player->getName();
	
	# Return output for HUD
	return $out;
};
