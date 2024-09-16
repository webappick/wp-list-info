<?php

namespace WebAppick\WPListInfo\Services;

use PHPUnit\Framework\TestCase;
use WebAppick\WPListInfo\Services\ProductService;

class ProductServiceTest extends TestCase {
	
	public function setUp(  ): void {
		parent::setUp();
	}
	
	public function testGetInfo() {
		
		$service = new ProductService();
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
		$service = new ProductService();
		$keys = $service->getKeys();
		$this->assertIsArray($keys);
	}
	
	public function testGetList(  ) {
		$service = new ProductService();
		$list = $service->getList();
		$this->assertIsArray($list);
		$key = array_key_first($list);
		$this->assertInstanceOf('WC_Product', $list[$key]);
	}
	
	public function testSearchList(  ) {
		$service = new ProductService();
		$list = $service->getList(array('s' => 'shirt'));
		$this->assertIsArray($list);
	}
}
