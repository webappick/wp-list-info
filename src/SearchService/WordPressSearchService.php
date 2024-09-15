<?php

namespace WebAppick\WPListInfo\SearchService;

use WebAppick\WPListInfo\Interfaces\WordPressSearchInterface;
use WP_Query;
use WP_User_Query;

/**
 * Class WordPressSearchService
 *
 * @package CTXFeed
 * @subpackage WebAppick\WPListInfo\Search
 * @category MyCategory
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 * @license  https://opensource.org/licenses/gpl-license.php GNU Public License
 */
class WordPressSearchService implements WordPressSearchInterface
{
	/**
	 * Retrieve terms from a specific taxonomy.
	 *
	 * @param string $taxonomy The taxonomy slug to retrieve terms for.
	 * @return array List of terms. Returns an empty array if taxonomy doesn't exist or there's an error.
	 */
	public function wp_terms($taxonomy, $args = array()) {
		if (!taxonomy_exists($taxonomy)) {
			return array();
		}
		
		$terms = get_terms([
			'taxonomy'   => $taxonomy,
			'hide_empty' => false,
			'orderby'    => 'name',
			'order'      => 'ASC',
		]);
		
		return !is_wp_error($terms) ? $terms : array();
	}
	
	/**
	 * Retrieve a list of users based on specified arguments.
	 *
	 * @param array $args Optional. Arguments to query users.
	 * @return array List of WP_User objects or an empty array if no users are found.
	 */
	public function wp_users($searchTerm,$args = array()) {
		$defaults = [
			'number'  => 10,
			'orderby' => 'ID',
			'order'   => 'ASC',
			'fields'  => 'all',
		];
		
		$queryArgs = wp_parse_args($args, $defaults);
		$userQuery = new WP_User_Query($queryArgs);
		$users = $userQuery->get_results();
		
		return !empty($users) ? $users : array();
	}
	
	/**
	 * Retrieve posts based on specified arguments.
	 *
	 * @param array $args Optional. Arguments to query posts.
	 * @return array List of WP_Post objects or an empty array if no posts are found.
	 */
	public function wp_posts($searchTerm,$args = array()) {
		$defaults = [
			'post_type'      => 'post',
			'posts_per_page' => 10,
			'orderby'        => 'date',
			'order'          => 'DESC',
		];
		
		$queryArgs = wp_parse_args($args, $defaults);
		$query = new WP_Query($queryArgs);
		$posts = $query->get_posts();
		
		return !empty($posts) ? $posts : array();
	}
	
	/**
	 * Retrieve all unique meta names (meta keys) across all posts in WordPress.
	 *
	 * @return array List of unique meta names.
	 */
	public function wp_post_metas($searchTerm,$args = array()) {
		global $wpdb;
		$metaKeys = $wpdb->get_col("SELECT DISTINCT meta_key FROM $wpdb->postmeta WHERE meta_key != ''");
		return !empty($metaKeys) ? $metaKeys : array();
	}
	
	/**
	 * Retrieve media attachments based on specified arguments.
	 *
	 * @param array $args Optional. Arguments to query media attachments.
	 * @return array List of WP_Post objects or an empty array if no media attachments are found.
	 */
	public function wp_media($searchTerm,$args = array()) {
		$defaults = [
			'post_type'      => 'attachment',
			'posts_per_page' => 10,
			'post_status'    => 'inherit',
		];
		
		$queryArgs = wp_parse_args($args, $defaults);
		$mediaQuery = new WP_Query($queryArgs);
		$media = $mediaQuery->get_posts();
		
		return !empty($media) ? $media : array();
	}
	
	/**
	 * Retrieve pages based on specified arguments.
	 *
	 * @param array $args Optional. Arguments to query pages.
	 * @return array List of WP_Post objects or an empty array if no pages are found.
	 */
	public function wp_pages($searchTerm,$args = array()) {
		$defaults = [
			'post_type'      => 'page',
			'posts_per_page' => 10,
			'orderby'        => 'date',
			'order'          => 'DESC',
		];
		
		$queryArgs = wp_parse_args($args, $defaults);
		$query = new WP_Query($queryArgs);
		$pages = $query->get_posts();
		
		return !empty($pages) ? $pages : array();
	}
	
	/**
	 * Retrieve comments for a specific post.
	 *
	 * @param int $postId The ID of the post to retrieve comments for.
	 * @return array List of WP_Comment objects or an empty array if no comments are found.
	 */
	public function wp_comments($postId,$args = array()) {
		if (empty($postId) || !is_numeric($postId)) {
			return array();
		}
		
		$comments = get_comments([
			'post_id' => $postId,
			'status'  => 'approve',
			'orderby' => 'comment_date',
			'order'   => 'DESC',
		]);
		
		return !empty($comments) ? $comments : array();
	}
	
	/**
	 * Retrieve all unique options from the WordPress options table.
	 *
	 * @return array List of unique option names.
	 */
	public function wp_options($option_name,$args = array()) {
		global $wpdb;
		$options = $wpdb->get_col("SELECT DISTINCT option_name FROM $wpdb->options WHERE option_name != ''");
		return !empty($options) ? $options : array();
	}
	
	/**
	 * Retrieve all unique custom fields (meta keys) across all posts in WordPress.
	 *
	 * @return array List of unique custom fields (meta keys).
	 */
	public function wp_custom_fields($field_name,$args = array()) {
		global $wpdb;
		$customFields = $wpdb->get_col("SELECT DISTINCT meta_key FROM $wpdb->postmeta WHERE meta_key != ''");
		return !empty($customFields) ? $customFields : array();
	}
	
	/**
	 * Retrieve tags from the 'post_tag' taxonomy.
	 *
	 * @return array List of WP_Term objects or an empty array if no tags are found.
	 */
	public function wp_tags($searchTerm,$args = array()) {
		$tags = get_terms([
			'taxonomy'   => 'post_tag',
			'hide_empty' => false,
			'orderby'    => 'name',
			'order'      => 'ASC',
		]);
		
		return !is_wp_error($tags) ? $tags : array();
	}
	
	/**
	 * @inerhitDoc
	 */
	public function wp_categories( $searchTerm, $args = array() ) {
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
	 * @inheritDoc
	 */
	public function wp_taxonomies($searchTerm, $args = array()) {
		// Fetch all public taxonomies
		$taxonomies = get_taxonomies( array( 'public' => true ), 'objects' );  // Return taxonomy names instead of full objects
		
		// Check if the result is not empty and return the taxonomies
		if ( !empty( $taxonomies ) ) {
			return $taxonomies;
		}
		
		// Return an empty array if no taxonomies are found
		return array();
	}
}
