<?php

namespace WebAppick\WPListInfo\Services;

use PHPUnit\Framework\TestCase;

class PostServiceTest extends TestCase {
	
	public function testGetInfo() {
		$service = new PostService();
		$info = $service->getInfo('post_id',0);
		$this->assertNull($info);
		$info = $service->getInfo( 'post_id',1 );
		$this->assertEquals( 1, $info);
	}
	
	public function testGetKeys() {
		$service = new PostService();
		$keys = $service->getKeys();
		$this->assertIsArray( $keys );
	}
	
	public function testGetList() {
		$service = new PostService();
		$list = $service->getList();
		print_r( $list );
		$this->assertIsArray( $list );
//		$key = array_key_first( $list );
//		$this->assertInstanceOf( 'WP_Post', $list[ $key ] );
	}
}
