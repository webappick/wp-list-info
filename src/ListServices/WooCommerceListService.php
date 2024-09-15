<?php

namespace WebAppick\WPListInfo\ListServices;

use WC_Shipping_Zones;
use WC_Tax;
use WebAppick\WPListInfo\Interfaces\WooCommerceListInterface;

/**
 * Class WooCommerceListService
 *
 * @package    WPListInfo
 * @subpackage WebAppick\WPListInfo\Services
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 * @license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 * */
class WooCommerceListService implements WooCommerceListInterface {

	/**
	 * Get the list of product visibilities.
	 *
	 * @return array
	 */
	public function wc_visibility_options() {
		return wc_get_product_visibility_options();
	}

	
	/**
	 * Get the list of product attributes.
	 *
	 * @return array List of product attributes.
	 */
	public function wc_attributes() {
		// Get the product attributes
		return wc_get_attribute_taxonomies();
	}
	
	/**
	 * Get the list of product types.
	 *
	 * @return array List of product types.
	 */
	public function wc_product_types() {
		// Get the product types
		return wc_get_product_types();
	}
	
	/**
	 * Get the list of stock statuses.
	 *
	 * @return array List of stock statuses.
	 */
	public function wc_stock_statuses() {
		// Get the stock statuses
		return wc_get_product_stock_status_options();
	}
	
	/**
	 * Get the list of order statuses.
	 *
	 * @return array List of order statuses.
	 */
	public function wc_order_statuses() {
		// GET the order statuses
		return wc_get_order_statuses();
	}
	
	/**
	 * Get the list of shipping classes.
	 *
	 * @return array
	 */
	public function wc_shipping_classes() {
		$shipping_methods = WC()->shipping->get_shipping_methods();
		$options          = array();

		foreach ( $shipping_methods as $method ) {
			$options[$method->id] = $method->get_method_title();
		}

		return $options;
	}
	
	/**
	 * Get the list of shipping methods.
	 *
	 * @return array List of shipping methods.
	 */
	public function wc_shipping_methods() {
		// Get the shipping methods
		return WC()->shipping->get_shipping_methods();
	}
	
	/**
	 * Get the list of shipping zones.
	 *
	 * @return array List of shipping zones.
	 */
	public function wc_shipping_zones() {
		// Get the shipping zones
		return WC_Shipping_Zones::get_zones();
	}
	
	/**
	 * Get the list of payment gateways.
	 *
	 * @return array List of payment gateways.
	 */
	public function wc_payment_gateways() {
		// Get the payment gateways
		return WC()->payment_gateways->payment_gateways();
	}
	
	/**
	 * Get the list of tax rates.
	 *
	 * @return array List of tax rates.
	 */
	public function wc_tax_rates() {
		// Get the tax rates
		return WC_Tax::get_rates();
	}
	
	/**
	 * Get the list of tax classes.
	 *
	 * @return array List of tax classes.
	 */
	public function wc_tax_classes() {
		// Get the tax classes
		return WC_Tax::get_tax_classes();
	}
	
}
