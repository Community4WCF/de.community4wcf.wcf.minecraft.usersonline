<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * @package	de.community4wcf.wcf.minecraft.usersonline
 * @svn		$Id: IndexPageMinecraftUsersOnlineListener.class.php 1893 2012-03-05 20:10:29Z TobiasH87 $
 */

class IndexPageMinecraftUsersOnlineListener implements EventListener {
	/**
	* @see EventListener::execute()
	*/
	public function execute($eventObj, $className, $eventName) {
		// check PACKAGE_ID, MODULE and Permission
		if(!in_array(PACKAGE_ID, explode(',', MINECRAFT_USERSONLINE_SELECT_STANDALONEAPPLICATION))) return;
		if(!MODULE_MINECRAFT_USERSONLINE || !WCF::getUser()->getPermission('canViewMinecraftUsersOnline')) return;
		
		// function
		$minecraftUserOnline = array();
		
		WCF::getCache()->addResource('minecraftUsersOnline', WCF_DIR.'cache/cache.minecraftUsersOnline.php', WCF_DIR.'lib/system/cache/CacheBuilderMinecraftUsersOnline.class.php', 0, MINECRAFT_USERSONLINE_CACHETIME);
		$minecraftUsersOnline = WCF::getCache()->get('minecraftUsersOnline');
		
		if($minecraftUsersOnline['userstotal'] || !MINECRAFT_USERSONLINE_HIDEWITHOUTUSERSONLINE) {
			WCF::getTPL()->assign(array('minecraftUsersOnline' => $minecraftUsersOnline));
			WCF::getTPL()->append('additionalBoxes', WCF::getTPL()->fetch('minecraftUsersOnline'));
		}
	}
}
?>