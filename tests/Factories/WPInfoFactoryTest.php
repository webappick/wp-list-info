<?php


use WebAppick\WPListInfo\Factories\WPInfoFactory;
use PHPUnit\Framework\TestCase;

class WPInfoFactoryTest extends TestCase {
	
	public function testGetKeys() {
		$keys= WPInfoFactory::getKeys('product');
		$this->assertIsArray($keys);
		
		/// Specify that the test expects a RuntimeException
		$this->expectException(RuntimeException::class);
		$invalidKeys = WPInfoFactory::getKeys('invalid');
		$this->expectExceptionMessage('RuntimeException: Invalid source provided. Source InvalidInfoService does not exist.');
	}
	
	public function testGetInfo() {
		$product = wc_get_product(34);
		
		// Test for all keys
		$info = WPInfoFactory::getInfo('product', $product);
		$this->assertIsArray($info, 'The result should be an array. Check your store have product with ID 34');
		
		// Test for a single key
		$info = WPInfoFactory::getInfo('product', $product, 'product_id');
		$this->assertIsInt($info, 'The result should be an integer. Check your store have product with ID 34');
		
		/// Specify that the test expects a RuntimeException
		$this->expectException(RuntimeException::class);
		WPInfoFactory::getInfo('invalid', $product);
		$this->expectExceptionMessage('RuntimeException: Invalid source provided. Source InvalidInfoService does not exist.');
	}
}
