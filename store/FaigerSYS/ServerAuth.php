<?php
# # # # # # # # # # # # # # #
# Author: FaigerSYS
# Descriprion: Adds check for player authenticaton (ServerAuth)
# # # # # # # # # # # # # # #

use pocketmine\Server;

$API = 2;

$onStart = function(int $currentAPI = 1) {
	if ($currentAPI === 1) {
		# https://github.com/FaigerSYS/superBAR-addons-store/wiki/Some-complications
		Server::getInstance()->getLogger()->warning('Addon for ServerAuth doesn\'t supports Addon API v1. Please update your superBAR to latest version!');
		return null;
	}
	
	# If plugin don't need a string for format like this one, set it to false
	$string = false;
	
	$sa = Server::getInstance()->getPluginManager()->getPlugin('ServerAuth');
	if ($sa && $sa->isEnabled()) {
		# Needed plugin founded, so we can enable addon
		$canEnable = true;
		$unloadReason = null;
		# Putting into valiable plugin to use in $onExecute
		$this->setVariable($sa);
	} else {
		# Else, we will disable addon because of it's useless without needed plugin
		$canEnable = false;
		$unloadReason = 'ServerAuth not founded!';
	}
	
	return [$string, $canEnable, $unloadReason];
};

$onExecute = function($player, $var, int $currentAPI = 1) {
	if ($currentAPI === 1) {
		return null;
	}
	
	# Checking for player authenticaton
	if ($var->isPlayerAuthenticated($player)) {
		$canShow = true;
		$message = null;
	} else {
		# $message will be showed instead of HUD if $canShow setted to false
		$message = 'Please authenticate';
		$canShow = false;
	}
	
	return [$message, $canShow];
};
