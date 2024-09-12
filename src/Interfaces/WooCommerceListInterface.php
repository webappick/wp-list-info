<?php

namespace WebAppick\WPListInfo\Interfaces;


/**
 * Class WooCommerceListInterface
 * @package WebAppick\WPListInfo\Interfaces
 * @subpackage WebAppick\WPListInfo\Interfaces
 */
interface WooCommerceListInterface {
	// Country and region-related lists
	public function getCountries();
	public function getStates($country);
	
	// Product-related lists
	public function getProducts();
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
	public function getCustomers();
	public function getCustomerMeta($customerId);
	
	// Coupon-related lists
	public function getCoupons();
	
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
	public function getSalesReports();
	public function getTopSellers();
}
