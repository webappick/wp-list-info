<?php

namespace WebAppick\WPListInfo\Factories;

use WebAppick\WPListInfo\OutputTypes\ArrayAOutput;
use WebAppick\WPListInfo\OutputTypes\ArrayNOutput;
use WebAppick\WPListInfo\OutputTypes\ObjectKOutput;
use WebAppick\WPListInfo\OutputTypes\ObjectOutput;

/**
 * Class OutputTypeFactory
 *
 * @package WPListInfo
 * @subpackage WebAppick\WPListInfo\Factories
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 * @license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 */
class OutputTypeFactory {
	
	/**
	 * @throws \Exception
	 */
	public static function get( $source, ...$params ) {
		switch ( $source ) {
			case 'ARRAY_A':
				$service = new ArrayAOutput;

				break;

			case 'ARRAY_N':
				$service = new ArrayNOutput;

				break;
				
			case 'OBJECT_K':
				$service = new ObjectKOutput;

				break;
				
			case 'OBJECT':
				$service = new ObjectOutput;

				break;
				
			default:
				throw new \RuntimeException( "Invalid source provided. Source $source does not exist." );
		}
		
		// Dynamically call the method on the service using the listType as the method name
		$method = 'transform';

		if ( method_exists( $service, $method ) ) {
			return call_user_func_array( array( $service, $method ), $params );
		}
		
		throw new \RuntimeException( "Invalid list type: Method $method does not exist." );
	}

}
