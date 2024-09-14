<?php

namespace WebAppick\WPListInfo\Services;

use PHPUnit\Framework\TestCase;

class ProductInfoServiceTest extends TestCase {
	
	public function testGetInfo() {
		
		$service = new ProductInfoService();
		// Get information about invalid product
		$info = $service->getInfo(0);
		$this->assertNull($info);
		$info = $service->getInfo(34);
		$this->assertIsArray($info, 'The information should be an array. Check site have product with id 34.');
		$this->assertArrayHasKey('product_id', $info);
	}
	
	/**
	 * @throws \Exception
	 */
	public function testGetKeys() {
		$service = new ProductInfoService();
		$keys = $service->getKeys();
		$this->assertIsArray($keys);
	}
}
