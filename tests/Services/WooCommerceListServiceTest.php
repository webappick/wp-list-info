<?php

use WebAppick\WPListInfo\Factories\ListFactory;
use WebAppick\WPListInfo\Services\WooCommerceListService;
use PHPUnit\Framework\TestCase;

class WooCommerceListServiceTest extends TestCase {
	protected function tearDown(): void
	{
		Mockery::close(); // Ensure Mockery verifies expectations after each test
	}
	
	/**
	 * @throws \Exception
	 */
	public function testGetCountries()
	{
		
		// Instantiate the WooCommerceListService and test the method
		// Format: country
		$countries = ListFactory::get('countries','woocommerce', 'country', ARRAY_A);
		$key = 234;
		$this->assertArrayHasKey($key, $countries);
		$expected = 'US';
		$this->assertEquals( $expected, $countries[$key]['id']);
		$expected = 'United States (US)';
		$this->assertEquals( $expected, $countries[$key]['name']);
		
		// Format: country, state
		$countries = ListFactory::get('countries','woocommerce', 'country, state', ARRAY_A);
		$key = 1923;
		$this->assertArrayHasKey($key, $countries);
		$expected = 'US:NY';
		$this->assertEquals( $expected, $countries[$key]['id']);
		$expected = 'United States (US), New York';
		$this->assertEquals( $expected, $countries[$key]['name']);

		// Format: state
		$countries = ListFactory::get('countries','woocommerce', 'state', ARRAY_A);
		$key = 1891;
		print_r( $countries);
		$this->assertArrayHasKey($expected, $countries);
		$expected = 'Alabama';
		$this->assertEquals( $expected, $countries[$key]['name']);
		
		$this->assertIsArray($countries);

	}
	
//	/**
//	 * @throws \Exception
//	 */
//	public function testGetStates()
//	{
//		// Instantiate the WooCommerceListService and test the method
//		$states = ListFactory::get('states','woocommerce', 'country state', ARRAY_A, 'US');
//		print_r( $states);
////		$expected = 2062;
////		$this->assertArrayHasKey($expected, $states);
////		$expected = 'United States (US) Alabama';
////		$this->assertEquals( $expected, $states[2062]['name']);
//
//		$this->assertIsArray($states);
//	}
}
