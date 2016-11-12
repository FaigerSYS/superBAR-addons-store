<?php
# # # # # # # # # # # # # # #
# Author: FaigerSYS
# Descriprion: Blank addon (API v2)
# # # # # # # # # # # # # # #

# You can import another classes
#use pocketmine\Server;

# Fuction that runs once when addon loading
$onStart = function(int $currentAPI = 1) {
	# $currentAPI - current API version for the addon
	
	# String to replace in HUD format
	$string = '%BLANK%';
	
	# Can enable addon (and if "false", addon unload reason)
	$canEnable = true;
	$unloadReason = null;
	# It's created for some situations, for example addon needed a plugin to work but plugin not installed
	
	# There you can write any data you want to use in $onExecute (one argument)
	#$this->setVariable(null);
	# You can also write there any class/plugin needed to addon works
	
	# Then return all data you defined
	return [$string, $canEnable, $unloadReason];
};

# Function that uses for HUD
$onExecute = function($player, $var, int $currentAPI = 1) {
	# $player - player class
	# $var - variable that you defined in $onStart
	
	# Can show HUD to player
	$canShow = true;
	# This can be used for auth plugins to reduce HUD showing when not autheficated
	
	# Define output for HUD
	$out = 'Hello, ' . $player->getName();
	
	# Set new variable if needed
	#$this->setVariable(null);
	
	# Return data for HUD
	return [$out, $canShow];
};
