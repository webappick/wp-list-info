<?php

namespace WebAppick\WPListInfo\Services;

use PHPUnit\Framework\TestCase;

class PostInfoServiceTest extends TestCase {
	
	public function testGetInfo() {
		$service = new PostInfoService();
		$info = $service->getInfo(0);
		$this->assertNull($info);
		$info = $service->getInfo( 1 );
		$this->assertIsArray( $info, 'The information of a post should be an array. Check your site have post with id 1' );
		$this->assertArrayHasKey( 'post_id', $info );
		print_r( $info );
	}
	
	public function testGetKeys() {
		$service = new PostInfoService();
		$keys = $service->getKeys();
		$this->assertIsArray( $keys );
	}
}
