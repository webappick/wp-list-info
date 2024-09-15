<?php

namespace WebAppick\WPListInfo\Interfaces;


/**
 * Class WooCommerceListInterface
 * @package WebAppick\WPListInfo\Interfaces
 * @subpackage WebAppick\WPListInfo\Interfaces
 */
interface WooCommerceListInterface {
	/**
	 * Get the list of product attributes.
	 *
	 * @return array List of product attributes.
	 */
	public function wc_attributes(  );
	
	/**
	 * Get the list of product types.
	 *
	 * @return array List of product types.
	 */
	public function wc_product_types();
	/**
	 * Get the list of stock statuses.
	 *
	 * @return array List of stock statuses.
	 */
	public function wc_stock_statuses();
	
	// Order-related lists
	
	
	/**
	 * Get the list of order statuses.
	 *
	 * @return array List of order statuses.
	 */
	public function wc_order_statuses();
	
	// Shipping-related lists
	/**
	 * Get the list of shipping methods.
	 *
	 * @return array List of shipping methods.
	 */
	public function wc_shipping_methods();
	/**
	 * Get the list of shipping zones.
	 *
	 * @return array List of shipping zones.
	 */
	public function wc_shipping_zones();
	
	// Payment-related lists
	/**
	 * Get the list of payment gateways.
	 *
	 * @return array List of payment gateways.
	 */
	public function wc_payment_gateways();
	
	// Tax-related lists
	/**
	 * Get the list of tax rates.
	 *
	 * @return array List of tax rates.
	 */
	public function wc_tax_rates();
	/**
	 * Get the list of tax classes.
	 *
	 * @return array List of tax classes.
	 */
	public function wc_tax_classes();
	
	/**
	 * Get the list of shipping classes.
	 * @return mixed
	 */
	public function wc_shipping_classes(  );
	
	/**
	 * Get the list of product visibilities.
	 *
	 * @return array
	 */
	public function wc_visibility_options(  );
	
	
}
