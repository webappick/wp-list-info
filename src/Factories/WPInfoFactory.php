<?php

namespace WebAppick\WPListInfo\Factories;


use WebAppick\WPListInfo\Strategies\InfoStrategies;

/**
 * Class InfoFactory
 *
 * @package CTXFeed
 * @subpackage WebAppick\WPListInfo\Factories
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category MyCategory
 */
class WPInfoFactory {
	
	/**
	 * Get information about a specific type.
	 *
	 * @param string $type The type of information to get. (e.g. 'post', 'user', 'comment', 'review')
	 * @param int $idObject The ID of the object to get information about.
	 * @param string|null $key The key of the information to get for specific information.
	 * @return mixed Information about the type.
	 */
	public static function getInfo($type, $idObject, $key=null) {
		$source = ucfirst($type) . 'InfoService';
		$class = 'WebAppick\WPListInfo\InfoServices\\'.$source;
		
		if ( ! class_exists( $class ) ) {
			throw new \RuntimeException( "Invalid source provided. Source $source does not exist." );
		}
		
		return (new InfoStrategies( new $class ))->getInfo($idObject, $key);
	}
	
	public static function getKeys( $type ) {
		
		$source = ucfirst($type) . 'InfoService';
		$class = 'WebAppick\WPListInfo\InfoServices\\'.$source;
		
		
		if ( ! class_exists( $class ) ) {
			throw new \RuntimeException( "Invalid source provided. Source $source does not exist." );
		}
		
		return (new InfoStrategies( new $class ))->getKeys();
	}
}