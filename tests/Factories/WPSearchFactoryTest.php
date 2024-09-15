<?php

namespace WebAppick\WPListInfo\Factories;

use PHPUnit\Framework\TestCase;

class WPSearchFactoryTest extends TestCase {
	
	/**
	 * @throws \Exception
	 */
	public function testSearch() {
		// Test for all searches
		$search = WPSearchFactory::search('wc_countries');
		$this->assertIsArray( $search );
		
		// Test for search term
		$search_united = WPSearchFactory::search('wc_countries', 'United');
		$this->assertIsArray( $search_united );
		
		// Test for search term and args
		$search_united_limit = WPSearchFactory::search('wc_countries', 'United', ['limit' => 1]);
		$this->assertIsArray( $search_united_limit );
		$this->assertCount( 1, $search_united_limit );
		
		// Test for invalid search term
		$this->expectException(\RuntimeException::class);
		$search_invalid_search_term = WPSearchFactory::search('wc_countries', 'Invalid');
		$this->assertEmpty( $search_invalid_search_term );
		
		// Specify that the test expects a RuntimeException
		$this->expectException(\RuntimeException::class);
		$search_invalid = WPSearchFactory::search('invalid');
		$this->expectExceptionMessage('RuntimeException: Invalid source provided. Source invalid does not exist.');
		
	}
}
