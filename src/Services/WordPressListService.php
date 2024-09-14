<?php

namespace WebAppick\WPListInfo\Services;

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
	 * @inerhitDoc
	 */
	public function getCategories() {
		// Fetch all categories
		$args = array(
			'taxonomy'   => 'category', // Category taxonomy
			'hide_empty' => false,      // Include empty categories
			'orderby'    => 'name',     // Order by name
			'order'      => 'ASC',      // Ascending order
		);
		
		// Get categories using get_terms()
		$categories = get_terms( $args );
		
		// Check for WP_Error and return the categories if no error
		if ( !is_wp_error( $categories ) ) {
			return $categories;
		}
		
		// Return an empty array if there's an error
		return array();
	}

	/**
	 * @inerhitDoc
	 */
	public function getTags() {
		// Define the arguments for fetching tags
		$args = array(
			'taxonomy'   => 'post_tag',  // Specify the 'post_tag' taxonomy
			'hide_empty' => false,       // Include empty tags
			'orderby'    => 'name',      // Order the tags by name
			'order'      => 'ASC',       // Sort tags in ascending order
		);
		
		// Fetch the tags using get_terms()
		$tags = get_terms( $args );
		
		// Check if there's an error and return an empty array if so
		if ( !is_wp_error( $tags ) ) {
			return $tags;
		}
		
		// Return an empty array in case of error
		return array();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getTaxonomies() {
		// Fetch all public taxonomies
		$taxonomies = get_taxonomies( array( 'public' => true ),'objects' );  // Return taxonomy names instead of full objects
		
		// Check if the result is not empty and return the taxonomies
		if ( !empty( $taxonomies ) ) {
			return $taxonomies;
		}
		
		// Return an empty array if no taxonomies are found
		return array();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getTerms( $taxonomy ) {
		// Check if the taxonomy exists before querying
		if ( !taxonomy_exists( $taxonomy ) ) {
			return array();
		}
		
		// Fetch terms for the specified taxonomy
		$terms = get_terms(
            array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => false,       // Include terms with no associated posts
				'orderby'    => 'name',      // Order terms by name
				'order'      => 'ASC',       // Sort terms in ascending order
		)
            );
		
		// Check if there is an error and return the terms if no error occurs
		if ( !is_wp_error( $terms ) ) {
			return $terms;
		}
		
		// Return an empty array in case of error
		return array();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getUsers( $args = array() ) {
		// Set default arguments if none are provided
		$defaults = array(
			'number'  => 10,           // Limit the number of users returned
			'orderby' => 'ID',         // Default ordering by user ID
			'order'   => 'ASC',        // Order results ascending by default
			'fields'  => 'all',        // Retrieve all fields of the user object
		);
		
		// Merge the provided arguments with the defaults
		$queryArgs = wp_parse_args( $args, $defaults );
		
		// Fetch the users using WP_User_Query
		$userQuery = new WP_User_Query( $queryArgs );
		$users     = $userQuery->get_results();
		
		// Check if users are found and return them
		if ( !empty( $users ) ) {
			return $users;
		}
		
		// Return an empty array if no users are found
		return array();
	}

	/**
	 * @inheritDoc
	 */
	public function getRoles() {
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
	public function getCapabilities() {
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
	public function getPosts( $args = array() ) {
		// Set default arguments if none are provided
		$defaults = array(
			'post_type'      => 'post',        // Default post type is 'post'
			'posts_per_page' => 10,            // Limit to 10 posts by default
			'orderby'        => 'date',        // Default ordering by date
			'order'          => 'DESC',        // Order posts in descending order by default
		);
		
		// Merge provided arguments with the defaults
		$queryArgs = wp_parse_args( $args, $defaults );
		
		// Query the posts using WP_Query
		$query = new WP_Query( $queryArgs );
		$posts = $query->get_posts();
		
		// Return the posts if found, or an empty array if no posts are found
		return !empty( $posts )
            ? $posts
            : array();
	}

	/**
	 * @inheritDoc
	 */
	public function getPostStatuses() {
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
	 * @param array $args Optional. Arguments to filter post types.
	 *                    Example: [
	 *                        'public' => true,// Get only public post types
	 *                    ]
	 * @return array List of post types where the key is the post type slug, and the value is an object with post type details.
	 */
	public function getPostTypes( $args = array() ) {
		// Set default arguments if none are provided
		$defaults = array(
			'public' => true, // By default, retrieve only public post-types
		);
		
		// Merge provided arguments with defaults
		$queryArgs = wp_parse_args( $args, $defaults );
		
		// Get all post-types based on the query arguments
		$postTypes = get_post_types( $queryArgs, 'objects' );
		
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
	public function getPostFormats() {
		// Fetch all post-formats
		$postFormats = get_post_format_strings();
		
		// Return post-formats or an empty array if none are found
		return !empty( $postFormats )
            ? $postFormats
            : array();
	}

	/**
	 * Retrieve all unique meta names (meta keys) across all posts in WordPress.
	 *
	 * This method fetches all unique custom meta-field names used in WordPress posts.
	 *
	 * @return array List of unique meta names (meta keys) used in the WordPress database. Returns an empty array if no meta-names are found.
	 */
	public function getPostMetas() {
		global $wpdb;
		
		// Query the database to get all distinct meta-keys from the post-meta table
		$metaKeys = $wpdb->get_col( "SELECT DISTINCT meta_key FROM $wpdb->postmeta WHERE meta_key != ''" );
		
		// Return the list of unique meta-keys or an empty array if none are found
		return !empty( $metaKeys )
            ? $metaKeys
            : array();
	}

	/**
	 * Retrieve a list of media attachments in WordPress.
	 *
	 * This method fetches all media attachments based on the provided query arguments.
	 *
	 * @param array $args Query arguments to filter the media attachments.
	 *                    Example: [
	 *                        'post_mime_type' => 'image', // Filter by image attachments
	 *                        'posts_per_page' => 10, // Limit the number of attachments
	 *                    ]
     * @return array List of WP_Post objects representing the media attachments. Returns an empty array if no media is found.
	 */
	public function getMedia( $args = array() ) {
		// Set default arguments if none are provided
		$defaults = array(
			'post_type'      => 'attachment',   // Fetch only media attachments
			'posts_per_page' => 10,             // Limit to 10 attachments by default
			'post_status'    => 'inherit',      // Ensure only published/inherited media files are fetched
		);
		
		// Merge provided arguments with the defaults
		$queryArgs = wp_parse_args( $args, $defaults );
		
		// Query the media attachments
		$mediaQuery = new WP_Query( $queryArgs );
		$media      = $mediaQuery->get_posts();
		
		// Return the media or an empty array if none are found
		return !empty( $media )
            ? $media
            : array();
	}

	/**
	 * Retrieve a list of WordPress pages.
	 *
	 * This method fetches all pages in WordPress.
	 *
	 * @param array $args Optional. Query arguments to filter the pages.
	 *                    Example: [
	 *                        'posts_per_page' => 10,    // Limit to 10 pages
	 *                        'orderby' => 'title',      // Order pages by title
	 *                        'order' => 'ASC',          // Sort in ascending order
	 *                    ]
     * @return array List of WP_Post objects representing the pages. Returns an empty array if no pages are found.
	 */
	public function getPages( $args = array() ) {
		// Set default arguments if none are provided
		$defaults = array(
			'post_type'      => 'page',        // Fetch only pages
			'posts_per_page' => 10,            // Limit to 10 pages by default
			'orderby'        => 'date',        // Order by date
			'order'          => 'DESC',        // Descending order by default
		);
		
		// Merge provided arguments with the defaults
		$queryArgs = wp_parse_args( $args, $defaults );
		
		// Query the pages using WP_Query
		$query = new WP_Query( $queryArgs );
		$pages = $query->get_posts();
		
		// Return the pages or an empty array if none are found
		return !empty( $pages )
            ? $pages
            : array();
	}

	/**
	 * Retrieve a list of comments for a specific post.
	 *
	 * This method fetches all comments associated with a given post ID.
	 *
	 * @param int $postId The ID of the post for which to retrieve comments.
     * @return array List of WP_Comment objects representing the comments. Returns an empty array if no comments are found.
	 */
	public function getComments( $postId ) {
		// Check if a valid post ID is provided
		if ( empty( $postId ) || !is_numeric( $postId ) ) {
			return array();
		}
		
		// Fetch comments for the specified post ID
		$comments = get_comments(
            array(
				'post_id' => $postId,
				'status'  => 'approve',    // Fetch only approved comments
				'orderby' => 'comment_date',
				'order'   => 'DESC',       // Descending order by comment date
		)
            );
		
		// Return the comments or an empty array if none are found
		return !empty( $comments )
            ? $comments
            : array();
	}

	/**
	 * Retrieve all unique options from the WordPress options table.
	 *
	 * This method fetches all unique option names from the WordPress options table.
	 *
	 * @return array List of unique option names. Returns an empty array if no options are found.
	 */
	public function getOptions() {
		global $wpdb;
		
		// Query the database to get all distinct option names from the wp_options table
		$options = $wpdb->get_col( "SELECT DISTINCT option_name FROM $wpdb->options WHERE option_name != ''" );
		
		// Return the list of unique option names or an empty array if none are found
		return !empty( $options )
            ? $options
            : array();
	}

	/**
	 * Retrieve a list of installed themes in WordPress.
	 *
	 * This method fetches all installed themes in WordPress.
	 *
	 * @return array List of WP_Theme objects representing the installed themes.
	 */
	public function getThemes() {
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
	public function getPlugins() {
		// Fetch all installed plugins using get_plugins()
		$plugins = get_plugins();
		
		// Return the list of plugins or an empty array if none are found
		return !empty( $plugins )
            ? $plugins
            : array();
	}

	/**
	 * Retrieve all unique custom fields (meta keys) across all posts in WordPress.
	 *
	 * This method fetches all distinct custom meta-fields (meta keys) from the postmeta table in WordPress.
	 *
	 * @return array List of unique custom field names (meta keys). Returns an empty array if no custom fields are found.
	 */
	public function getCustomFields() {
		global $wpdb;
		
		// Query the database to get all distinct meta-keys from the post-meta table
		$customFields = $wpdb->get_col( "SELECT DISTINCT meta_key FROM $wpdb->postmeta WHERE meta_key != ''" );
		
		// Return the list of unique custom fields or an empty array if none are found
		return !empty( $customFields )
            ? $customFields
            : array();
	}
	
}
