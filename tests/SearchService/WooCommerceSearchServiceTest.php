<?php

namespace WebAppick\WPListInfo\SearchService;

use PHPUnit\Framework\TestCase;

class WooCommerceSearchServiceTest extends TestCase {
	
	private $service;
	public function setUp(  ): void {
		parent::setUp();
		$this->service = new WooCommerceSearchService();
	}
	
	public function testWc_countries() {
		// Test for all searches
		$search = $this->service->wc_countries( $searchTerm = null, $args = array() );
		$this->assertIsArray( $search );
		
		// Test for search term
		$search_united = $this->service->wc_countries( 'United');
		$this->assertIsArray( $search_united );
		
		// Test for search term and args
		$search_united_limit = $this->service->wc_countries('United', ['limit' => 1]);
		$this->assertIsArray( $search_united_limit );
		$this->assertCount( 1, $search_united_limit );
		
		// Test for invalid search term
		$search_invalid_search_term = $this->service->wc_countries( 'Invalid');
		$this->assertEmpty( $search_invalid_search_term );
	}
	
	public function testWc_states() {
		// Test for all searches
		$search = $this->service->wc_states( $searchTerm = null, $args = array() );
		$this->assertEmpty( $search );
		
		// Test for search term
		$search_united = $this->service->wc_states( 'US');
		$this->assertIsArray( $search_united );
		$this->assertArrayHasKey( 'NY', $search_united);

		// Test for search term and args
		$search_united_limit = $this->service->wc_states('US', ['limit' => 1]);
		$this->assertIsArray( $search_united_limit );
		$this->assertCount( 1, $search_united_limit );
		print_r( $search_united_limit );

		// Test for invalid search term
		$search_invalid_country_code = $this->service->wc_states( 'Invalid');
		$this->assertEmpty( $search_invalid_country_code );
	}
	
//	public function testWc_attributes() {
//
//	}
	

//
//	public function testWc_product_attribute_options() {
//
//	}
//
//	public function testWc_customers() {
//
//	}
//
//	public function testWc_products() {
//
//	}
//
//	public function testWc_coupons() {
//
//	}
//
//	public function testWc_orders() {
//
//	}
//
//	public function testWc_categories() {
//
//	}
//
//	public function testWc_shipping_zone_methods() {
//
//	}
//
//	public function testWc_tags() {
//
//	}
}
