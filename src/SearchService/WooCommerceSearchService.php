<?php

namespace WebAppick\WPListInfo\SearchService;

use WC_Shipping_Zones;
use WebAppick\WPListInfo\Interfaces\WooCommerceSearchInterface;
use WP_Query;
use WP_User_Query;

/**
 * Class WooCommerceSearchService
 *
 * @package    WebAppick
 * @subpackage WebAppick\WPListInfo\Search
 * @category   WooCommerce
 * @author     Ohidul Islam <wahid0003@gmail.com>
 * @link       https://webappick.com
 * @license    https://opensource.org/licenses/gpl-license.php GNU Public License
 */
class WooCommerceSearchService implements WooCommerceSearchInterface {
	
	/**
	 * Get the list of countries.
	 *
	 * @param string $searchTerm Optional search term to filter countries.
	 * @param array  $args       Optional. Additional arguments for filtering the countries list.
	 *                           Example: [
	 *                               'limit' => 10,// Limit the number of countries returned
	 *                           ]
	 * @return array List of countries.
	 */
	public function wc_countries($args = array()) {
		
		$searchTerm = $args['s'] ?? '';
		
		// Fetch all countries
		$countries = WC()->countries->get_countries();
		
		// If a search term is provided, filter the countries by the search term
		if (!empty($searchTerm)) {
			$countries = array_filter($countries, static function($country) use ($searchTerm) {
				return stripos($country, $searchTerm) !== false;
			});
		}
		
		// If a limit is provided in $args, apply it
		if (!empty($args['limit']) && is_numeric($args['limit'])) {
			$countries = array_slice($countries, 0, $args['limit']);
		}
		
		// Return the filtered list of countries
		return $countries;
	}
	
	
	/**
	 * Get the list of states for a country.
	 *
	 * @param string $countryCode Required search term to filter states. If empty, an empty array will be returned.
	 * @param array  $args        Optional. Additional arguments for filtering the state list.
	 *                            Example: [
	 *                                'limit' => 10, // Limit the number of states returned
	 *                            ]
	 * @return array List of states of a country.
	 */
	public function wc_states($args = array()) {
		
		$countryCode = $args['s'] ?? '';
		
		// If no country code is provided, return an empty array
		if (empty($countryCode)) {
			return array();
		}
		
		// Fetch the list of states for the given country code
		$states = WC()->countries->get_states($countryCode);
		
		// If the country has no states, return an empty array
		if (empty($states)) {
			return array();
		}
		
		// If a limit is provided in $args, apply it
		if (!empty($args['limit']) && is_numeric($args['limit'])) {
			$states = array_slice($states, 0, $args['limit']);
		}
		
		// Return the filtered list of states
		return $states;
	}
	
	
	/**
	 * Get the list of products based on query arguments.
	 *
	 * @param array $args Query arguments to filter products.
	 *                    Example: [
	 *                        'limit' => 10, 'orderby' => 'date', 'order' => 'DESC'
	 *                    ]
	 * @return array List of products.
	 */
	public function wc_products($args = array()) {
		
		$defaults = [
			'limit'   => -1,
			'orderby' => 'date',
			'order'   => 'DESC',
			'status'  => 'publish',
		];
		
		$queryArgs = wp_parse_args($args, $defaults);
		$products  = wc_get_products($queryArgs);
		
		return !empty($products) ? $products : [];
	}
	
	/**
	 * Get the list of orders based on query arguments.
	 *
	 * @param array $args Query arguments to filter orders.
	 *                    Example: [
	 *                        'limit' => 10, 'orderby' => 'date', 'order' => 'DESC'
	 *                    ]
	 * @return array List of orders.
	 */
	public function wc_orders($args = array()) {
		// Get the search term
		$searchTerm = '';
		if(isset($args['s'])){
			$searchTerm = $args['s'];
			unset($args['s']);
		}
		
		$defaults = [
			'limit'   => 10,
			'orderby' => 'date',
			'order'   => 'DESC',
			'status'  => 'any',
		];
		
		$queryArgs = wp_parse_args($args, $defaults);
		$orders    = wc_get_orders($queryArgs);
		
		return !empty($orders) ? $orders : [];
	}
	
	/**
	 * Get the list of customers based on query arguments.
	 *
	 * @param array $args Query arguments to filter customers.
	 *                    Example: [
	 *                        'role' => 'customer', 'orderby' => 'ID', 'order' => 'ASC'
	 *                    ]
	 * @return array List of customers.
	 */
	public function wc_customers($args = array()) {
		
		// Get the search term
		$searchTerm = '';
		if(isset($args['s'])){
			$searchTerm = $args['s'];
			unset($args['s']);
		}
		
		$defaults = [
			'role'    => 'customer',
			'number'  => -1,
			'orderby' => 'ID',
			'order'   => 'ASC',
		];
		
		$queryArgs  = wp_parse_args($args, $defaults);
		$userQuery  = new WP_User_Query($queryArgs);
		$customers  = $userQuery->get_results();
		
		return !empty($customers) ? $customers : [];
	}
	
	/**
	 * Get the list of coupons based on query arguments.
	 *
	 * @param array $args Query arguments to filter coupons.
	 *                    Example: [
	 *                        'posts_per_page' => 10, 'orderby' => 'title', 'order' => 'ASC'
	 *                    ]
	 * @return array List of coupons.
	 */
	public function wc_coupons($args = array()) {
		
		// Get the search term
		$searchTerm = '';
		if(isset($args['s'])){
			$searchTerm = $args['s'];
			unset($args['s']);
		}
		
		$defaults = [
			'post_type'      => 'shop_coupon',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		];
		
		$queryArgs   = wp_parse_args($args, $defaults);
		$couponQuery = new WP_Query($queryArgs);
		$coupons     = $couponQuery->get_posts();
		
		return !empty($coupons) ? $coupons : [];
	}
	
	/**
	 * Get the product attribute options for a given taxonomy.
	 *
	 * @param string $taxonomy The taxonomy slug to retrieve terms for.
	 * @return array List of product attribute terms.
	 */
	public function wc_product_attribute_options($args = array()) {
		
		// Get the search term
		$taxonomy = '';
		if(isset($args['s'])){
			$taxonomy = $args['s'];
			unset($args['s']);
		}
		
		return get_terms([
			'taxonomy'   => $taxonomy,
			'hide_empty' => false,
		]);
	}
	
	/**
	 * Get the shipping zone methods for a given zone ID.
	 *
	 * @param int $zoneId The zone ID for which to retrieve shipping methods.
	 *
	 * @return bool|\WC_Shipping_Zone
	 */
	public function wc_shipping_zone_methods($args = array()) {
		// Get the search term
		$zoneId = '';
		if(isset($args['s'])){
			$zoneId = $args['s'];
			unset($args['s']);
		}
		return WC_Shipping_Zones::get_zone($zoneId);
	}
	
	/**
	 * Get the list of product categories.
	 *
	 * @return array List of product categories.
	 */
	public function wc_categories($args = array()) {
		
		// Get the search term
		$searchTerm = '';
		if(isset($args['s'])){
			$searchTerm = $args['s'];
			unset($args['s']);
		}
		
		return get_terms([
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
		]);
	}
	
	/**
	 * Get the list of product tags.
	 *
	 * @return array List of product tags.
	 */
	public function wc_tags($args = array()) {
		// Get the search term
		$searchTerm = '';
		if(isset($args['s'])){
			$searchTerm = $args['s'];
			unset($args['s']);
		}
		
		return get_terms([
			'taxonomy'   => 'product_tag',
			'hide_empty' => false,
		]);
	}
	
	/**
	 * Get the list of product attributes.
	 *
	 * @return array List of product attributes.
	 */
	public function wc_attributes($args = array()) {
		// Get the search term
		$searchTerm = '';
		if(isset($args['s'])){
			$searchTerm = $args['s'];
			unset($args['s']);
		}
		
		return wc_get_attribute_taxonomies();
	}
	
}
