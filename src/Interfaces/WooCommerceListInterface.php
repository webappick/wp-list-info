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
	 * Get a list of products
	 * @param array $args Query arguments
	 *
	 * @return mixed
	 */
	public function getProducts($args);
	public function getProductCategories();
	public function getProductTags();
	public function getProductAttributes();
	public function getProductVariations($productId);
	public function getProductTypes();
	public function getStockStatuses();
	
	// Order-related lists
	public function getOrders();
	public function getOrderStatuses();
	
	// Customer-related lists
	public function getCustomers($args=[]);
	public function getCustomerMeta($customerId);
	
	// Coupon-related lists
	public function getCoupons($args);
	
	// Shipping-related lists
	public function getShippingMethods();
	public function getShippingZones();
	public function getShippingZoneMethods($zoneId);
	
	// Payment-related lists
	public function getPaymentGateways();
	
	// Tax-related lists
	public function getTaxRates();
	public function getTaxClasses();
	
	// Reports-related lists
	public function getTopProducts($count);
	public function getTopCustomers($count);
}
