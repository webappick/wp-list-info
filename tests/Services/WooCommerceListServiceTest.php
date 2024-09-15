<?php

use PHPUnit\Framework\TestCase;
use WebAppick\WPListInfo\Factories\ListFactory;

class WooCommerceListServiceTest extends TestCase {
	protected function tearDown(): void
	{
		Mockery::close(); // Ensure Mockery verifies expectations after each test
	}
	
	/**
	 * @throws \Exception
	 */
//	public function testGetCountries()
//	{
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$countries = $service->getCountries();
//		$this->assertIsArray($countries);
//		$this->assertNotEmpty($countries);
//		$this->assertArrayHasKey('US', $countries);
//		$this->assertEquals('United States (US)', $countries['US']);
//	}
//
//
//	public function testGetStates()
//	{
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$states = $service->getStates();
//		$this->assertIsArray($states);
//		$this->assertNotEmpty($states);
//		$this->assertArrayHasKey('US', $states);
//		$this->assertArrayHasKey('NY', $states['US']);
//		$this->assertEquals('New York', $states['US']['NY']);
//
//		// Get states by country code
//		$states = $service->getStates('CA');
//		$this->assertIsArray($states);
//		$this->assertNotEmpty($states);
//		$this->assertArrayHasKey('BC', $states);
//		$this->assertEquals('British Columbia', $states['BC']);
//	}
	
//	public function testGetProducts() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$products = $service->getProducts([]);
//		$this->assertIsArray($products, 'Products is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($products, 'Products are empty. Check if there are any products in the WooCommerce store.');
//		$this->assertContainsOnlyInstancesOf('WC_Product', $products);
//	}
//
//	public function testGetProductCategories() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$categories = $service->getProductCategories();
//
//		$this->assertIsArray($categories, 'Product categories is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($categories, 'Product categories are empty. Check if there are any categories in the WooCommerce store.');
//		$this->assertArrayHasKey(0, $categories);
//		$this->assertArrayHasKey(1, $categories);
//		$this->assertInstanceOf('WP_Term', $categories[0]);
//	}
	
//	public function testGetProductTags() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$tags = $service->getProductTags();
//
//		$this->assertIsArray($tags, 'Product tags is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($tags, 'Product tags are empty. Check if there are any tags in the WooCommerce store.');
//		$this->assertArrayHasKey(0, $tags);
//		$this->assertInstanceOf('WP_Term', $tags[0]);
//	}
	
	public function testGetProductAttributes() {
		// Instantiate the WooCommerceListService and test the method
		//$service = new WooCommerceListService();
		$attributes = ListFactory::get('wc_attributes', []);
		print_r( $attributes );
//		$this->assertIsArray($attributes, 'Product attributes is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($attributes, 'Product attributes are empty. Check if there are any attributes in the WooCommerce store.');
//		$key = array_key_first($attributes);
//		$this->assertArrayHasKey($key, $attributes);
//		$this->assertInstanceOf('stdClass', $attributes[$key]);
	}
	
//	public function testGetProductVariations() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$products = $service->getProducts([]);
//		$productId = $products[0]->get_id();
//		$variations = $service->getProductVariations($productId);
//
//		$this->assertIsArray($variations, 'Product variations is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($variations, 'Product variations are empty. Check if there are any variations in the WooCommerce store.');
//		$this->assertContainsOnlyInstancesOf('WC_Product_Variation', $variations);
//	}
	
//	public function testGetProductTypes() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$types = $service->getProductTypes();
//
//		$this->assertIsArray($types, 'Product types is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($types, 'Product types are empty. Check if there are any product types in the WooCommerce store.');
//		$this->assertContainsOnly('string', $types);
//	}
//
//	public function testGetStockStatuses() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$statuses = $service->getStockStatuses();
//
//		$this->assertIsArray($statuses, 'Stock statuses is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($statuses, 'Stock statuses are empty. Check if there are any stock statuses in the WooCommerce store.');
//		$this->assertContainsOnly('string', $statuses);
//	}
//
//	public function testGetOrders() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$orders = $service->getOrders();
//
//		$this->assertIsArray($orders, 'Orders is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($orders, 'Orders are not empty. Check if there are any orders in the WooCommerce store.');
//	}
//
//	public function testGetOrderStatuses() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$statuses = $service->getOrderStatuses();
//		$this->assertIsArray($statuses, 'Order statuses is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($statuses, 'Order statuses are empty. Check if there are any order statuses in the WooCommerce store.');
//		$this->assertContainsOnly('string', $statuses);
//	}
//
//	public function testGetCustomers() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$customers = $service->getCustomers();
//
//		$this->assertIsArray($customers, 'Customers is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($customers, 'Customers are not empty. Check if there are any customers in the WooCommerce store.');
//		$key = array_key_first($customers);
//		$this->assertInstanceOf('WP_User', $customers[$key]);
//		$this->assertContainsOnlyInstancesOf('WP_User', $customers);
//	}
//
//	public function testGetCoupons() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$coupons = $service->getCoupons([]);
//
//		$this->assertIsArray($coupons, 'Coupons is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($coupons, 'Coupons are not empty. Check if there are any coupons in the WooCommerce store.');
//		$key = array_key_first($coupons);
//		$this->assertInstanceOf('WP_Post', $coupons[$key]);
//	}
//
//	public function testGetShippingMethods() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$methods = $service->getShippingMethods();
//		$this->assertIsArray($methods, 'Shipping methods is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($methods, 'Shipping methods are empty. Check if there are any shipping methods in the WooCommerce store.');
//		$this->assertArrayHasKey('flat_rate', $methods);
//		$this->assertArrayHasKey('free_shipping', $methods);
//	}
//
//	public function testGetShippingZones() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$zones = $service->getShippingZones();
//
//		$this->assertIsArray($zones, 'Shipping zones is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($zones, 'Shipping zones are empty. Check if there are any shipping zones in the WooCommerce store.');
//	}
//
//	public function testGetShippingZoneMethods() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$zoneId = 1;
//		$methods = $service->getShippingZoneMethods($zoneId);
//		$this->assertInstanceOf('WC_Shipping_Zone', $methods);
//
//	}
//
//	public function testGetPaymentGateways() {
//		// Instantiate the WooCommerceListService and test the method
//		$service  = new WooCommerceListService();
//		$gateways = $service->getPaymentGateways();
//		$this->assertIsArray( $gateways, 'Payment gateways is not an array. Check if the method returns an array.' );
//		$this->assertNotEmpty( $gateways, 'Payment gateways are empty. Check if there are any payment gateways in the WooCommerce store.' );
//	}
//
//	public function testGetTaxRates() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$rates = $service->getTaxRates();
//
//		$this->assertIsArray($rates, 'Tax rates is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($rates, 'Tax rates are empty. Check if there are any tax rates in the WooCommerce store.');
//	}
//
//	public function testGetTaxClasses() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$classes = $service->getTaxClasses();
//
//		$this->assertIsArray($classes, 'Tax classes is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($classes, 'Tax classes are empty. Check if there are any tax classes in the WooCommerce store.');
//	}
//
//	public function testGetShippingClasses() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$classes = $service->getShippingClasses();
//
//		$this->assertIsArray($classes, 'Shipping classes is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($classes, 'Shipping classes are empty. Check if there are any shipping classes in the WooCommerce store.');
//	}
//
//	public function testGetProductVisibilities() {
//		// Instantiate the WooCommerceListService and test the method
//		$service = new WooCommerceListService();
//		$visibilities = $service->getProductVisibilities();
//
//		$this->assertIsArray($visibilities, 'Product visibilities is not an array. Check if the method returns an array.');
//		$this->assertNotEmpty($visibilities, 'Product visibilities are empty. Check if there are any product visibilities in the WooCommerce store.');
//		$this->assertContainsOnly('string', $visibilities);
//	}
}
