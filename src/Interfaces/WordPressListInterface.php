<?php

namespace WebAppick\WPListInfo\Interfaces;

/**
 * Class WordPressListInterface
 *
 * @package WebAppick\WPListInfo\Interfaces
 * @subpackage WebAppick\WPListInfo\Interfaces
 */
interface WordPressListInterface {
	
	/**
	 * Retrieve a list of all user roles in WordPress.
	 *
	 * This method fetches all registered WordPress user roles.
	 *
	 * @return array List of user roles where the key is the role slug and the value is an array containing the role's name and capabilities.
	 *               Returns an empty array if no roles are found.
	 */
	public function wp_roles();

	/**
	 * Retrieve all capabilities from all registered roles in WordPress.
	 *
	 * This method fetches all unique capabilities from all registered user roles in WordPress.
	 *
	 * @return array List of all unique capabilities across all roles.
	 */
	public function wp_capabilities();
	
	/**
	 * Retrieve all registered post statuses in WordPress.
	 *
	 * This method fetches all post statuses that are registered in WordPress.
	 *
	 * @return array List of post statuses where the key is the status slug and the value is the label.
	 */
	public function wp_post_statuses();

	public function wp_post_types();

	public function wp_post_formats();

	public function wp_themes();

	public function wp_plugins();
	
	
}
