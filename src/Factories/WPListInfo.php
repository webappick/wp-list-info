<?php

namespace WebAppick\WPListInfo\Factories;

use WebAppick\WPListInfo\Strategies\ServiceStrategy;/**
 * Class WPListInfo
 *
 * @package CTXFeed
 * @subpackage WebAppick\WPListInfo\Factories
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category MyCategory
 */
class WPListInfo {

	public static function GetInfo( $key, $idObject ) {
		$get_service = explode( '_', $key );
		$service     = $get_service[0];
		
		$class = 'WebAppick\WPListInfo\Services\\' . ucfirst( $service ) . 'Service';
		
		if ( ! class_exists( $class ) ) {
			throw new \RuntimeException( "Invalid source provided. Source $service does not exist." );
		}
		
		return ( new ServiceStrategy( new $class ) )->getInfo($key, $idObject );
	}
	
	/**
	 * @throws \Exception
	 */
	public static function GetList( $type, $args = array() ) {
		
		$class = 'WebAppick\WPListInfo\Services\\' . ucfirst(strtolower($type)) . 'Service';
		
		if ( ! class_exists( $class ) ) {
			throw new \RuntimeException( "Invalid source provided. Source $type does not exist." );
		}
		
		$data = ( new ServiceStrategy( new $class ) )->getList($args );
		
		$formattedData = FormatFactory::format( $type, $data, $args['format'] );
		
		return $formattedData;
	}
	
	public static function Search( $args = array() ) {
	}

}
