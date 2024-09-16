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
		
		// Check if the format is set
		if( ! isset( $args['format'] ) ) {
			$args['format'] = [];
		}
		
		// Check if the output is set and valid
		if (!isset($args['output']) || !in_array($args['output'], ['ARRAY', 'OBJECT', 'array', 'object'])) {
			$args['output'] = 'OBJECT';
		}
		
		// Format the data
		return FormatFactory::format( $type, $data, $args['format'], $args['output'] );
	}

}
