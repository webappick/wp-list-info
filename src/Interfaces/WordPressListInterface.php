<?php

namespace WebAppick\WPListInfo\Interfaces;

/**
 * Class WordPressListInterface
 *
 * @package WebAppick\WPListInfo\Interfaces
 * @subpackage WebAppick\WPListInfo\Interfaces
 */
interface WordPressListInterface {

// Taxonomy-related lists
	public function getCategories();

/**
 * Retrieve a list of WordPress tags.
 *
 * This method retrieves all post-tags from the 'post_tag' taxonomy in WordPress.
 *
 * @return array List of WP_Term objects representing the tags. Returns an empty array if no tags are found or if an error occurs.
 */
	public function getTags();

	/**
	 * Retrieve a list of registered taxonomies in WordPress.
	 *
	 * This method retrieves all publicly registered taxonomies in WordPress.
	 *
	 * @return array List of taxonomy names (strings). Returns an empty array if no taxonomies are found.
	 */
	public function getTaxonomies();

	/**
	 * Retrieve terms for a specific taxonomy.
	 *
	 * This method fetches terms for the given taxonomy.
	 *
	 * @param string $taxonomy The taxonomy for which to retrieve terms.
	 *                         Example: 'category', 'post_tag', or any custom taxonomy.
     * @return array List of WP_Term objects representing the terms. Returns an empty array if no terms are found or an error occurs.
	 */
	public function getTerms( $taxonomy );

// User-related lists
	/**
	 * Retrieve a list of WordPress users based on provided query arguments.
	 *
	 * This method allows you to fetch WordPress users with customizable query parameters.
	 *
	 * @param array $args Query arguments for fetching users.
	 *                    Example: [
	 *                        'role' => 'subscriber', // Fetch users by role
	 *                        'number' => 10, // Limit the number of users
	 *                        'orderby' => 'login', // Order by login name
	 *                        'order' => 'ASC', // Order direction
	 *                    ]
     * @return array List of WP_User objects representing the users. Returns an empty array if no users are found or if an error occurs.
	 */
	public function getUsers( $args );

	/**
	 * Retrieve a list of all user roles in WordPress.
	 *
	 * This method fetches all registered WordPress user roles.
	 *
	 * @return array List of user roles where the key is the role slug and the value is an array containing the role's name and capabilities.
	 *               Returns an empty array if no roles are found.
	 */
	public function getRoles();

	/**
	 * Retrieve all capabilities from all registered roles in WordPress.
	 *
	 * This method fetches all unique capabilities from all registered user roles in WordPress.
	 *
	 * @return array List of all unique capabilities across all roles.
	 */
	public function getCapabilities();

// Post-related lists
	/**
	 * Retrieve a list of WordPress posts based on provided query arguments.
	 *
	 * This method fetches WordPress posts according to the specified query arguments.
	 *
	 * @param array $args Query arguments for retrieving posts. Accepts any valid WP_Query arguments.
	 *                    Example: [
	 *                        'post_type'   => 'post',     // Post type to query
	 *                        'posts_per_page' => 10,      // Limit the number of posts
	 *                        'orderby'     => 'date',     // Order by field
	 *                        'order'       => 'DESC',     // Order direction
	 *                    ].
     * @return array List of WP_Post objects representing the posts. Returns an empty array if no posts are found.
	 */
	public function getPosts( $args );

	/**
	 * Retrieve all registered post statuses in WordPress.
	 *
	 * This method fetches all post statuses that are registered in WordPress.
	 *
	 * @return array List of post statuses where the key is the status slug and the value is the label.
	 */
	public function getPostStatuses();

	public function getPostTypes();

	public function getPostFormats();

	public function getPostMetas();

// Media-related lists
	public function getMedia();

// Page-related lists
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
	public function getPages( $args = array() );


// Comment-related lists
	public function getComments( $postId );

// Settings and options-related lists
	public function getOptions();

	public function getThemes();

	public function getPlugins();

// Custom fields
	public function getCustomFields();

}
