<?php
# # # # # # # # # # # # # # #
# Author: FaigerSYS
# Descriprion: Adds RankUp (by Falkirks) support (%RANK%)
# # # # # # # # # # # # # # #

use pocketmine\Server;

# There we can use multiple APIs
$API = [1, 2];
# BUT, you must also provide support of them in $onStart and $onExecute

$onStart = function(int $currentAPI = 1) {
	$string = '%RANK%';
	
	$rankup = Server::getInstance()->getPluginManager()->getPlugin('RankUp');
	if ($rankup && $rankup->isEnabled()) {
		# Needed plugin founded, so we can enable addon
		$canEnable = true;
		$unloadReason = null;
		# Putting into valiable plugin to use in $onExecute
		$this->setVariable($rankup);
	} else {
		# Else, we can't enable addon because of it's useless without needed plugin
		$canEnable = false;
		$unloadReason = 'RankUp not founded!';
	}
	
	# We can add multiple API support
	if ($currentAPI === 1) {
		# API v1 supports only "string-for-format" return. So we can't disable addon
		# Also, to set variable uses this combination
		$this->createVariable = $rankup;
		return $string;
	} else {
		$this->setVariable($rankup);
		return [$string, $canEnable, $unloadReason];
	}
};

$onExecute = function($player, $var, int $currentAPI = 1) {
	# Checking for plugin if API ver. = 1
	if ($currentAPI === 1 && !$var) {
		$out = 'NoPlugin';
		# API v1 supports only output return
		return $out;
	} else {
		$out = $var->getPermManager()->getGroup($player);
		$out = ($out !== false ? $out : 'NoRank');
		return [$out, true];
	}
};
