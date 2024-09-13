<?php

namespace WebAppick\WPListInfo\Services;


use WC_Shipping_Zones;
use WC_Tax;
use WebAppick\WPListInfo\Interfaces\WooCommerceListInterface;
use WP_User_Query;

/**
 * Class WooCommerceListService
 *
 * @package    WPListInfo
 * @subpackage WebAppick\WPListInfo\Services
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 * */
class WooCommerceListService implements WooCommerceListInterface {
	/**
	 * @var array $countries List of WooCommerce countries
	 */
	protected $countries;
	/**
	 * @var array $states List of WooCommerce states
	 */
	protected $states;
	
	public function __construct() {
	
	}
	
	/**
	 * @inerhitDoc
	 */
	public function getCountries() {
		return WC()->countries->get_countries();
	}
	
	public function getStates($countryCode=null) {
		if($countryCode) {
			return WC()->countries->get_states($countryCode);
		}
		return WC()->countries->get_states();
	}
	
	public function getProducts($args) {
		// Set the default arguments
		$defaultArgs = ['limit' => -1];
		
		// Merge the default arguments with the provided arguments
		$args = wp_parse_args($args, $defaultArgs);
		
		// Get the products
		return wc_get_products($args);
	}
	
	public function getProductCategories() {
		// Get the product categories
		return get_terms([
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
		]);
	}
	
	public function getProductTags() {
		// Get the product tags
		return get_terms([
			'taxonomy' => 'product_tag',
			'hide_empty' => false,
		]);
	}
	
	public function getProductAttributes() {
		// Get the product attributes
		return wc_get_attribute_taxonomies();
	}
	
	public function getProductVariations( $productId ) {
		// Get the product variations
		return wc_get_product_variations($productId);
	}
	
	public function getProductTypes() {
		// Get the product types
		return wc_get_product_types();
	}
	
	public function getStockStatuses() {
		// Get the stock statuses
		return wc_get_product_stock_status_options();
	}
	
	public function getOrders() {
		// TODO: Implement getOrders() method.
	}
	
	public function getOrderStatuses() {
		// GET the order statuses
		return wc_get_order_statuses();
	}
	
	public function getCustomers($args=[]) {
		// Get the customers
		$defaultArgs = array(
			'role'    => 'customer',
			'order'   => 'ASC',
			'orderby' => 'display_name',
			'number'  => 20,
		);
		
		$args = wp_parse_args($args, $defaultArgs);
		
		
		return ( new \WP_User_Query( ) )->get_results();
	}
	
	public function getCustomerMeta( $customerId ) {
		// Get the customer meta
		return get_user_meta($customerId);
	}
	
	public function getCoupons($args) {
		// Set the default arguments
		$defaultArgs = [
			'post_type' => 'shop_coupon',
		];
		
		// Merge the default arguments with the provided arguments
		$args = wp_parse_args($args, $defaultArgs);
		
		// Get the coupons using the provided arguments and with get posts method
		return get_posts($args);
		
	}
	
	public function getShippingMethods() {
		// Get the shipping methods
		return WC()->shipping->get_shipping_methods();
	}
	
	public function getShippingZones() {
		// Get the shipping zones
		return WC_Shipping_Zones::get_zones();
	}
	
	public function getShippingZoneMethods( $zoneId ) {
		// Get the shipping zone methods
		return WC_Shipping_Zones::get_zone($zoneId);
	}
	
	public function getPaymentGateways() {
		// Get the payment gateways
		return WC()->payment_gateways->payment_gateways();
	}
	
	public function getTaxRates() {
		// Get the tax rates
		return WC_Tax::get_rates();
	}
	
	public function getTaxClasses() {
		// Get the tax classes
		return WC_Tax::get_tax_classes();
	}
	
	public function getTopProducts($count) {
		// Query & Get the sold products by the provided count
		// Need to query order items and group by product ID
		// Then sort by the sum of the order items
		// Then get the top products by the provided count
		
		global $wpdb;
		
		$query = "
			SELECT order_items.order_item_id as product_id, SUM(order_items.order_item_quantity) as product_quantity
			FROM {$wpdb->prefix}woocommerce_order_items as order_items
			LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta ON order_items.order_item_id = order_item_meta.order_item_id
			LEFT JOIN {$wpdb->prefix}posts as orders ON order_items.order_id = orders.ID
			WHERE orders.post_status IN ('wc-completed', 'wc-processing')
			AND order_items.order_item_type = 'line_item'
			GROUP BY order_items.order_item_id
			ORDER BY product_quantity DESC
			LIMIT $count";
		
		return $wpdb->get_results($query);
	}
	
	public function getTopCustomers($count) {
		// Query & Get the top customers by the provided count
		return get_users([
			'role' => 'customer',
			'orderby' => 'post_count',
			'order' => 'DESC',
			'number' => $count,
		]);
	}
}