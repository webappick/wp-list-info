<?php

namespace WebAppick\WPListInfo\Interfaces;

interface WooCommerceSearchInterface {
	public function wc_countries($args = array());
	
	public function wc_states($args = array());
	
	public function wc_products($args = array());
	
	public function wc_categories($args = array());
	
	public function wc_tags($args = array());
	
	public function wc_attributes($args = array());
	
	public function wc_orders($args = array());
	
	public function wc_customers($args = array());
	
	public function wc_coupons($args = array());
	
	public function wc_product_attribute_options($args = array());
	
	public function wc_shipping_zone_methods($args = array());
}
