<?php

use PHPUnit\Framework\TestCase;
use WebAppick\WPListInfo\Factories\ListFactory;


class ListFactoryTest extends TestCase
{
	
	protected function tearDown(): void {
		\Mockery::close();
	}
	/**
	 * @throws \Exception
	 */
	public function testGetCountriesReturnsArray()
	{
		
		$service = ListFactory::get('countries', 'woocommerce');
		$this->assertIsArray($service, "The service should return an array.");
	}
	
	/**
	 * @throws \Exception
	 */
	public function testGetStatesForUS()
	{
		$service = ListFactory::get('states', 'woocommerce', 'US');
		$this->assertIsArray($service);
	}
}
