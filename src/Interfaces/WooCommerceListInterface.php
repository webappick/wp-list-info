<?php

namespace WebAppick\WPListInfo\Interfaces;


/**
 * Class WooCommerceListInterface
 * @package WebAppick\WPListInfo\Interfaces
 * @subpackage WebAppick\WPListInfo\Interfaces
 */
interface WooCommerceListInterface {
	/**
	 * Get a list of countries
	 * @return array
	 */
	public function getCountries();
	/**
	 * Get a list of states
	 * @param string $countryCode Country code (e.g., 'US')
	 * @return array
	 */
	public function getStates($countryCode=null);
	
	/**
	 * Get WooCommerce products and their variations based on the provided query arguments.
	 *
	 * @param array $args Query arguments for filtering products.
	 *                    Example: [
	 *                        'limit' => 10,           // Number of products to retrieve
	 *                        'orderby' => 'date',     // Column to order by (e.g., date, ID)
	 *                        'order' => 'DESC',       // Order of the results (ASC or DESC)
	 *                        'category' => ['shirts'], // Filter by category (slugs)
	 *                    ]
	 * @return array List of WooCommerce products with variations.
	 */
	public function getProducts($args);
	/**
	 * Get the list of product categories.
	 *
	 * @return array List of product categories.
	 */
	public function getProductCategories();
	/**
	 * Get the list of product tags.
	 *
	 * @return array List of product tags.
	 */
	public function getProductTags();
	/**
	 * Get the list of product attributes.
	 *
	 * @return array List of product attributes.
	 */
	public function getProductAttributes();
	
	/**
	 * Get the list of product types.
	 *
	 * @return array List of product types.
	 */
	public function getProductTypes();
	/**
	 * Get the list of stock statuses.
	 *
	 * @return array List of stock statuses.
	 */
	public function getStockStatuses();
	
	// Order-related lists
	/**
	 * Get WooCommerce orders based on the provided query arguments.
	 *
	 * @param array $args Query arguments for filtering orders.
	 *                    Example: [
	 *                        'limit' => 10,            // Number of orders to retrieve
	 *                        'orderby' => 'date',      // Column to order by (e.g., date, ID)
	 *                        'order' => 'DESC',        // Order of the results (ASC or DESC)
	 *                        'status' => 'completed',  // Order status to filter by (e.g., 'completed')
	 *                        'customer' => 1           // Customer ID to filter orders by
	 *                    ]
	 * @return array List of WooCommerce orders.
	 */
	public function getOrders($args);
	
	/**
	 * Get the list of order statuses.
	 *
	 * @return array List of order statuses.
	 */
	public function getOrderStatuses();
	
	// Customer-related lists
	/**
	 * Get WooCommerce customers based on the provided query arguments.
	 *
	 * @param array $args Query arguments for filtering customers.
	 *                    Example: [
	 *                        'role' => 'customer',  // Default WooCommerce role
	 *                        'number' => 10,        // Number of customers to retrieve
	 *                        'order' => 'ASC',      // Order of the results (ASC or DESC)
	 *                        'orderby' => 'ID'      // Column to order by
	 *                    ]
	 * @return array List of WooCommerce customers.
	 */
	public function getCustomers($args=[]);
	
	// Coupon-related lists
	/**
	 * Get WooCommerce coupons based on the provided query arguments.
	 *
	 * @param array $args Query arguments for filtering coupons.
	 *                    Example: [
	 *                        'posts_per_page' => 10,    // Number of coupons to retrieve
	 *                        'order' => 'ASC',          // Order of the results (ASC or DESC)
	 *                        'orderby' => 'title',      // Column to order by (e.g., title, date)
	 *                        'meta_query' => [...]      // Meta query to filter by custom fields
	 *                    ]
	 * @return array List of WooCommerce coupons.
	 */
	public function getCoupons($args);
	
	// Shipping-related lists
	/**
	 * Get the list of shipping methods.
	 *
	 * @return array List of shipping methods.
	 */
	public function getShippingMethods();
	/**
	 * Get the list of shipping zones.
	 *
	 * @return array List of shipping zones.
	 */
	public function getShippingZones();
	/**
	 * Get the shipping methods for a given shipping zone ID.
	 *
	 * @param int $zoneId The shipping zone ID.
	 * @return array List of shipping methods for the zone.
	 */
	public function getShippingZoneMethods($zoneId);
	
	// Payment-related lists
	/**
	 * Get the list of payment gateways.
	 *
	 * @return array List of payment gateways.
	 */
	public function getPaymentGateways();
	
	// Tax-related lists
	/**
	 * Get the list of tax rates.
	 *
	 * @return array List of tax rates.
	 */
	public function getTaxRates();
	/**
	 * Get the list of tax classes.
	 *
	 * @return array List of tax classes.
	 */
	public function getTaxClasses();
	
	/**
	 * Get the list of shipping classes.
	 * @return mixed
	 */
	public function getShippingClasses(  );
	
	/**
	 * Get the list of product visibilities.
	 * @return mixed
	 */
	public function getProductVisibilities(  );
	
	/**
	 * Get the list of product attribute options.
	 *
	 * @param string $taxonomy The taxonomy name. (e.g., 'pa_color')
	 *
	 * @return mixed
	 */
	public function getProductAttributeOptions( $taxonomy );
}
