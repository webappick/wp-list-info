<?php

namespace WebAppick\WPListInfo\Services;

use PHPUnit\Framework\TestCase;

class WordPressListServiceTest extends TestCase {
	
	private $service;
	public function setUp(  ): void {
		parent::setUp();
		$this->service = new WordPressListService();
	}
	
	public function testGetPostFormats() {
		$formats = $this->service->getPostFormats();
		$this->assertIsArray( $formats );
	}
	
	public function testGetCapabilities() {
		$caps = $this->service->getCapabilities();
		$this->assertIsArray( $caps );
	}
	
	public function testGetPostStatuses() {
		$statuses = $this->service->getPostStatuses();
		$this->assertIsArray( $statuses );
	}
	
	public function testGetTaxonomies() {
		$taxonomies = $this->service->getTaxonomies();
		print_r( $taxonomies );
		$this->assertIsArray( $taxonomies );
		$key = array_key_first( $taxonomies );
		$this->assertNotEmpty( $taxonomies);
		$this->assertInstanceOf('WP_Taxonomy', $taxonomies[$key]);
	}
	public function testGetTerms() {
		$terms = $this->service->getTerms('category');
		$this->assertIsArray( $terms );
		$key = array_key_first( $terms );
		$this->assertNotEmpty( $terms);
		$this->assertInstanceOf('WP_Term', $terms[$key]);
	}
//
//	public function testGetCategories() {
//
//	}
//
//	public function testGetPages() {
//
//	}
//
//	public function testGetPlugins() {
//
//	}
//
//	public function testGetComments() {
//
//	}
//
//	public function testGetOptions() {
//
//	}
//
//	public function testGetTags() {
//
//	}
//
//	public function testGetPostMetas() {
//
//	}
//
//	public function testGetPosts() {
//
//	}
//
//	public function testGetPostTypes() {
//
//	}
//
//	public function testGetRoles() {
//
//	}
//
//	public function testGetCustomFields() {
//
//	}
//
//	public function testGetThemes() {
//
//	}
//

//
//	public function testGetMedia() {
//
//	}
//
//	public function testGetUsers() {
//
//	}
}
