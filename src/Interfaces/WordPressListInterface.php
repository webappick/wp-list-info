<?php

namespace WebAppick\WPListInfo\Interfaces;


/**
 * Class WordPressListInterface
 * @package WebAppick\WPListInfo\Interfaces
 * @subpackage WebAppick\WPListInfo\Interfaces
 */
interface WordPressListInterface {
	// Taxonomy-related lists
	public function getCategories();
	public function getTags();
	public function getTaxonomies();
	
	// User-related lists
	public function getUsers();
	public function getRoles();
	public function getUserMeta($userId);
	
	// Post-related lists
	public function getPosts();
	public function getPostStatuses();
	public function getPostTypes();
	
	// Media-related lists
	public function getMedia();
	
	// Page-related lists
	public function getPages();
	
	// Comment-related lists
	public function getComments();
	
	// Settings and options-related lists
	public function getOptions();
	public function getThemes();
	public function getPlugins();
	
	// Menu-related lists
	public function getMenus();
	public function getMenuItems($menuId);
	
	// Widget-related lists
	public function getWidgets();
	
	// Custom fields
	public function getCustomFields($postType);
}
