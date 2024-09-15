<?php

use PHPUnit\Framework\TestCase;
use WebAppick\WPListInfo\Factories\WPListFactory;


class WPListFactoryTest extends TestCase
{
	public function testWCListFactory()
	{
		
		$list = WPListFactory::get('wc_visibility_options');
		$this->assertIsArray($list, "The service should return an array.");
	}
	
	public function testWPListFactory()
	{
		
		$list = WPListFactory::get('wp_roles');
		$this->assertIsArray($list, "The service should return an array.");
	}
}
