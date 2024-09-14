<?php

namespace WebAppick\WPListInfo\Factories;

use WebAppick\WPListInfo\Services\CommentInfoService;
use WebAppick\WPListInfo\Services\CouponInfoService;
use WebAppick\WPListInfo\Services\CustomerInfoService;
use WebAppick\WPListInfo\Services\CustomFieldInfoService;
use WebAppick\WPListInfo\Services\MetaInfoService;
use WebAppick\WPListInfo\Services\OrderInfoService;
use WebAppick\WPListInfo\Services\PageInfoService;
use WebAppick\WPListInfo\Services\PaymentInfoService;
use WebAppick\WPListInfo\Services\PluginInfoService;
use WebAppick\WPListInfo\Services\PostInfoService;
use WebAppick\WPListInfo\Services\ProductInfoService;
use WebAppick\WPListInfo\Services\ReviewInfoService;
use WebAppick\WPListInfo\Services\ShippingInfoService;
use WebAppick\WPListInfo\Services\SiteInfoService;
use WebAppick\WPListInfo\Services\TaxInfoService;
use WebAppick\WPListInfo\Services\TaxonomyInfoService;
use WebAppick\WPListInfo\Services\ThemeInfoService;
use WebAppick\WPListInfo\Services\UserInfoService;

/**
 * Class WPInfo
 *
 * @package CTXFeed
 * @subpackage WebAppick\WPListInfo\Factories
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 * @license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category MyCategory
 */
class WPInfo {

	protected static $services = array(
		'post'         => PostInfoService::class,
		'page'         => PageInfoService::class,
		'product'      => ProductInfoService::class,
		'shipping'     => ShippingInfoService::class,
		'tax'          => TaxInfoService::class,
		'customer'     => CustomerInfoService::class,
		'order'        => OrderInfoService::class,
		'payment'      => PaymentInfoService::class,
		'coupon'       => CouponInfoService::class,
		'taxonomy'     => TaxonomyInfoService::class,
		'user'         => UserInfoService::class,
		'comment'      => CommentInfoService::class,
		'review'       => ReviewInfoService::class,
		'meta'         => MetaInfoService::class,
		'custom_field' => CustomFieldInfoService::class,
		'plugin'       => PluginInfoService::class,
		'theme'        => ThemeInfoService::class,
		'site'         => SiteInfoService::class,
	);
	
	/**
	 * Get the value by ID and key, dynamically calling the appropriate service.
	 *
	 * @param int    $id The ID of the entity (post, product, etc.).
	 * @param string $key The key for the specific field (e.g., 'post_date', 'product_price').
     * @return mixed|null The formatted value, or null if not found.
	 */
	public static function get( $id, $key ) {
		// Extract prefix from the key (e.g., 'post', 'product')
		$prefix = explode( '_', $key )[0];
		
		// Check if we have a service for this prefix
		if ( !isset( self::$services[$prefix] ) ) {
			return null; // Service isn't found for this prefix
		}
		
		// Get the corresponding service class
		$serviceClass = self::$services[$prefix];
		
		// Instantiate the service (or use dependency injection if needed)
		$service = new $serviceClass();
		
		// Call the getInfo method on the service and return the specific key
		$info = $service->getInfo( $id, $key );
		
		// TODO: Format the value if needed
		
		return $info;
		
	}

}
