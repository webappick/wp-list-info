<?php

namespace WebAppick\WPListInfo\Interfaces;

interface WordPressSearchInterface {
	public function wp_pages($searchTerm,$args = array());
	
	public function wp_comments($searchTerm,$args = array());
	
	public function wp_terms($searchTerm,$args = array());
	
	public function wp_users($searchTerm,$args = array());
	
	public function wp_posts($searchTerm,$args = array());
	
	public function wp_options($searchTerm,$args = array());
	
	public function wp_post_metas($searchTerm,$args = array());
	
	public function wp_media($searchTerm,$args = array());
	
	public function wp_custom_fields($searchTerm,$args = array());
	
	public function wp_tags($searchTerm,$args = array());
	
	public function wp_categories($searchTerm,$args = array());
	
	public function wp_taxonomies($searchTerm,$args = array());
}
