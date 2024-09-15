<?php

namespace WebAppick\WPListInfo\ListServices;

use WebAppick\WPListInfo\Interfaces\WordPressListInterface;

/**
 * Class WordPressListService
 *
 * @category WPListInfo
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://webappick.com
 */
class WordPressListService implements WordPressListInterface {
	
	

	/**
	 * @inheritDoc
	 */
	public function wp_roles() {
		global $wp_roles;
		
		// Check if global roles are set
		if ( isset( $wp_roles ) ) {
			// Get the roles from the global $wp_roles object
			return $wp_roles->roles;
		}
		
		// Return an empty array if no roles are found
		return array();
	}
	
	/**
	 * @inheritDoc
	 */
	public function wp_capabilities() {
		global $wp_roles;
		
		// Initialize an empty array to store capabilities
		$all_capabilities = array();
		
		// Iterate over each role
		foreach ( $wp_roles->roles as $role ) {
			// Append capabilities directly into $all_capabilities array
			foreach ( $role['capabilities'] as $capability => $granted ) {
				$all_capabilities[$capability] = true;
			}
		}
		
		// Return the array keys to get unique capabilities
		return array_keys( $all_capabilities );
	}

	/**
	 * @inheritDoc
	 */
	public function wp_post_statuses() {
		// Get all registered post statuses
		$statuses = get_post_statuses();
		
		// Return the post statuses or an empty array if none are found
		return !empty( $statuses )
            ? $statuses
            : array();
	}

	/**
	 * Retrieve all registered post types in WordPress.
	 *
	 * This method fetches all post types that are registered in WordPress.
	 *
	 * @return array List of post types where the key is the post type slug, and the value is an object with post type details.
	 */
	public function wp_post_types() {
		
		// Get all post-types based on the query arguments
		$postTypes = get_post_types( ['public' => true], 'objects' );
		
		// Return the post-types or an empty array if none are found
		return !empty( $postTypes )
            ? $postTypes
            : array();
	}

	/**
	 * Retrieve all registered post-formats in WordPress.
	 *
	 * This method fetches all post-formats registered in WordPress, including standard and custom formats.
	 *
	 * @return array List of post-formats where the key is the format slug, and the value is the human-readable name.
	 *               Returns an empty array if no post-formats are found.
	 */
	public function wp_post_formats() {
		// Fetch all post-formats
		$postFormats = get_post_format_strings();
		
		// Return post-formats or an empty array if none are found
		return !empty( $postFormats )
            ? $postFormats
            : array();
	}

	/**
	 * Retrieve a list of installed themes in WordPress.
	 *
	 * This method fetches all installed themes in WordPress.
	 *
	 * @return array List of WP_Theme objects representing the installed themes.
	 */
	public function wp_themes() {
		// Fetch all installed themes using wp_get_themes()
		$themes = wp_get_themes();
		
		// Return the list of themes or an empty array if none are found
		return !empty( $themes )
            ? $themes
            : array();
	}

	/**
	 * Retrieve a list of installed plugins in WordPress.
	 *
	 * This method fetches all installed plugins in WordPress, including active and inactive plugins.
	 *
	 * @return array List of installed plugins where the key is the plugin slug and the value is the plugin data.
	 */
	public function wp_plugins() {
		// Fetch all installed plugins using get_plugins()
		$plugins = get_plugins();
		
		// Return the list of plugins or an empty array if none are found
		return !empty( $plugins )
            ? $plugins
            : array();
	}
}
