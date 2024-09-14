<?php

namespace WebAppick\WPListInfo\Services;


use WC_Shipping_Zones;
use WC_Tax;
use WebAppick\WPListInfo\Interfaces\WooCommerceListInterface;
use WP_Query;
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
	 * @inerhitDoc
	 */
	public function getCountries() {
		return WC()->countries->get_countries();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getStates($countryCode=null) {
		if($countryCode) {
			return WC()->countries->get_states($countryCode);
		}
		return WC()->countries->get_states();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getProducts($args) {
		// Set default arguments if none are provided
		$defaults = [
			'limit' => -1,           // Limit the number of products returned
			'orderby' => 'date',     // Default ordering by date
			'order' => 'DESC',       // Order results descending by default
			'status' => 'publish',   // Fetch only variable products (products with variations)
		];
		
		// Merge the provided arguments with the defaults
		$queryArgs = wp_parse_args($args, $defaults);
		
		// Use WooCommerce wc_get_products() to fetch products
		$products = wc_get_products($queryArgs);
		
		// Return the products or an empty array if none found
		return !empty($products) ? $products : [];
	}
	
	public function getProductVisibilities(  ) {
		return wc_get_product_visibility_options();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getProductCategories() {
		// Get the product categories
		return get_terms([
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
		]);
	}
	
	/**
	 * @inheritDoc
	 */
	public function getProductTags() {
		// Get the product tags
		return get_terms([
			'taxonomy' => 'product_tag',
			'hide_empty' => false,
		]);
	}
	
	/**
	 * @inheritDoc
	 */
	public function getProductAttributes() {
		// Get the product attributes
		return wc_get_attribute_taxonomies();
	}
	
	public function getProductAttributeOptions( $taxonomy ) {
		// Get the product attribute options
		return get_terms([
			'taxonomy' => $taxonomy,
			'hide_empty' => false,
		]);
		
	}
	
	/**
	 * @inheritDoc
	 */
	public function getProductTypes() {
		// Get the product types
		return wc_get_product_types();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getStockStatuses() {
		// Get the stock statuses
		return wc_get_product_stock_status_options();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getOrders($args = []) {
		// Set default arguments if none are provided
		$defaults = [
			'limit' => 10,           // Limit the number of orders returned
			'orderby' => 'date',     // Default ordering by date
			'order' => 'DESC',       // Order results descending by default
			'status' => 'any',       // Retrieve all order statuses
		];
		
		// Merge the provided arguments with the defaults
		$queryArgs = wp_parse_args($args, $defaults);
		
		// Use WooCommerce wc_get_orders() to fetch orders
		$orders = wc_get_orders($queryArgs);
		
		// Return the orders or an empty array if none found
		return !empty($orders) ? $orders : [];
	}
	
	/**
	 * @inheritDoc
	 */
	public function getOrderStatuses() {
		// GET the order statuses
		return wc_get_order_statuses();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getCustomers($args = []) {
		// Set default arguments if none are provided
		$defaults = [
			'role' => 'customer', // Only fetch users with the 'customer' role
			'number' => -1,       // Limit the number of customers returned
			'orderby' => 'ID',    // Default ordering by ID
			'order' => 'ASC',     // Order results ascending
		];
		
		// Merge the provided arguments with the defaults
		$queryArgs = wp_parse_args($args, $defaults);
		
		// Run the WP_User_Query to fetch customers
		$userQuery = new WP_User_Query($queryArgs);
		
		// Get the results (list of customer objects)
		$customers = $userQuery->get_results();
		
		// Return the customers or an empty array if none found
		return !empty($customers) ? $customers : [];
	}
	
	/**
	 * @inheritDoc
	 */
	public function getCoupons($args = []) {
		// Set default arguments if none are provided
		$defaults = [
			'post_type' => 'shop_coupon',     // Query the 'shop_coupon' post-type
			'posts_per_page' => -1,           // Limit the number of coupons returned
			'orderby' => 'title',             // Default ordering by title
			'order' => 'ASC',                 // Order results ascending
		];
		
		// Merge the provided arguments with the defaults
		$queryArgs = wp_parse_args($args, $defaults);
		
		// Run the WP_Query to fetch coupons
		$couponQuery = new WP_Query($queryArgs);
		
		// Get the results (list of coupon posts)
		$coupons = $couponQuery->get_posts();
		
		// Return the coupons or an empty array if none found
		return !empty($coupons) ? $coupons : [];
	}
	
	/**
	 * @inheritDoc
	 */
	public function getShippingClasses(  ) {
		$shipping_methods = WC()->shipping->get_shipping_methods();
		$options = [];
		foreach ($shipping_methods as $method) {
			$options[$method->id] = $method->get_method_title();
		}
		return $options;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getShippingMethods() {
		// Get the shipping methods
		return WC()->shipping->get_shipping_methods();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getShippingZones() {
		// Get the shipping zones
		return WC_Shipping_Zones::get_zones();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getShippingZoneMethods( $zoneId ) {
		// Get the shipping zone methods
		return WC_Shipping_Zones::get_zone($zoneId);
	}
	
	/**
	 * @inheritDoc
	 */
	public function getPaymentGateways() {
		// Get the payment gateways
		return WC()->payment_gateways->payment_gateways();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getTaxRates() {
		// Get the tax rates
		return WC_Tax::get_rates();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getTaxClasses() {
		// Get the tax classes
		return WC_Tax::get_tax_classes();
	}
	
	
}