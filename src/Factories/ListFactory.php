<?php

namespace WebAppick\WPListInfo\Factories;

use WebAppick\WPListInfo\Services\WooCommerceListService;
use WebAppick\WPListInfo\Services\WordPressListService;

/**
 * Class ListFactory
 *
 * @package    WebAppick\WPListInfo
 * @subpackage WebAppick\WPListInfo\Factories
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 * @license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 * */
class ListFactory {

	/**
	 * @throws \Exception
	 */
	public static function get( $listType, $source, ...$params ) {
		switch ( $source ) {
			case 'WordPress':
				$service = new WordPressListService;

				break;

			case 'woocommerce':
				$service = new WooCommerceListService;

				break;

			default:
				throw new \RuntimeException( "Invalid source provided. Source $source does not exist." );
		}
		
		// Dynamically call the method on the service using the listType as the method name
		$method = 'get' . ucfirst( $listType );

		if ( method_exists( $service, $method ) ) {
			return call_user_func_array( array( $service, $method ), $params );
		}
		
		throw new \RuntimeException( "Invalid list type: Method $method does not exist." );
	}

}
