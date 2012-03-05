<?PHP
// wcf imports
require_once(WCF_DIR.'lib/system/cache/CacheBuilder.class.php');

/**
 * @package	de.community4wcf.wcf.minecraft.usersonline
 * @svn		$Id: CacheBuilderMinecraftUsersOnline.class.php 1898 2012-03-05 22:11:20Z TobiasH87 $
 */

class CacheBuilderMinecraftUsersOnline implements CacheBuilder {
	/**
	 * @see CacheBuilder::getData()
	 */
	public function getData($cacheResource) {
		if(!MODULE_MINECRAFT_USERSONLINE) return;
		
		$data = array(
			'users' => array(),
			'userstotal' => 0,
		);
		
		$sql = "SELECT * 
				FROM ".MINECRAFT_USERSONLINE_SQL_TABLENAME."
				ORDER BY ".MINECRAFT_USERSONLINE_SQL_FELDNAME." ASC";
		$result = WCF::getDB()->sendQuery($sql);
		while ($row = WCF::getDB()->fetchArray($result)) {
			$data['users'][] = $row;
			$data['userstotal']++;
		}
		
	return $data;
	}	
}
?>