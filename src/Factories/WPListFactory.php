<?php

namespace WebAppick\WPListInfo\Factories;

use WebAppick\WPListInfo\ListServices\WooCommerceListService;
use WebAppick\WPListInfo\ListServices\WordPressListService;

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
class WPListFactory {

	/**
	 * Get the list of a specific type.
	 *
	 * @param string $list List type.
	 *
	 * @return array List of the specific type.
	 */
	public static function get( $list ) {
		// Get the list type from the list name prefix (e.g. 'wc_attribute' => 'wc')
		$get_source = explode( '_', $list );
		$source     = $get_source[0];
		
		switch ( $source ) {
			case 'wp': // WordPress
				$service = new WordPressListService;

				break;

			case 'wc': // WooCommerce
				$service = new WooCommerceListService;

				break;

			default:
				throw new \RuntimeException( "Invalid source provided. Source $source does not exist." );
		}

		if ( method_exists( $service, $list ) ) {
			return $service->$list();
		}
		
		throw new \RuntimeException( "Invalid list type: Method $list does not exist." );
	}

}
