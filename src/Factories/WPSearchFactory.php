<?php

namespace WebAppick\WPListInfo\Factories;


use WebAppick\WPListInfo\SearchService\WooCommerceSearchService;
use WebAppick\WPListInfo\SearchService\WordPressSearchService;

/**
 * Class SearchFactory
 *
 * @package CTXFeed
 * @subpackage WebAppick\WPListInfo\Factories
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category MyCategory
 */
class WPSearchFactory {
	
	/**
	 * Search for a specific search type.
	 *
	 * @param string $search The search type.
	 * @param string $searchTerm The search term.
	 * @param array  $args Optional. Additional arguments to pass to the search function. Default is an empty array.
	 * @return mixed The search results.
	 */
	public static function search($search, $searchTerm = null, $args = ['limit' => 20]) {
		
		// Get the search type from the search name prefix (e.g. 'wc_attribute' => 'wc')
		$get_source = explode( '_', $search );
		$source = $get_source[0];
		
		switch ( $source ) {
			case 'wp': // WordPress
				$service = new WordPressSearchService;

				break;

			case 'wc': // WooCommerce
				$service = new WooCommerceSearchService;

				break;

			default:
				throw new \RuntimeException( "Invalid source provided. Source $source does not exist." );
		}
		

		if ( method_exists( $service, $search ) ) {
			return $service->$search($searchTerm, $args);
		}
		
		throw new \RuntimeException( "Invalid search type: Method $search does not exist." );
	}

}