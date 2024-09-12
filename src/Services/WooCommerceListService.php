<?php

namespace WebAppick\WPListInfo\Services;


use WebAppick\WPListInfo\Factories\FormatFactory;
use WebAppick\WPListInfo\Interfaces\WooCommerceListInterface;

/**
 * Class WooCommerceListService
 *
 * @package    WPListInfo
 * @subpackage WebAppick\WPListInfo\Services
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 * */
class WooCommerceListService implements WooCommerceListInterface {
	/**
	 * @var array $countries List of WooCommerce countries
	 */
	protected $countries;
	/**
	 * @var array $states List of WooCommerce states
	 */
	protected $states;
	
	public function __construct() {
		$this->countries = WC()->countries->get_countries();
		$this->states = WC()->countries->get_states();
	}
	
	/**
	 * Get the list of countries
	 *
	 * @param string $format Output format. Default is 'country'
	 *                       Example formats:
	 *                       'country': 'United States'
	 *                       'country, state': 'United States, Alabama'
	 *                       'code_country country': 'US United States'
	 *                       'code_country country state': 'US United States, Alabama'
	 *                       'code_country:code_state state - country ': 'US:AL Alabama - United States'
	 *
	 *                       Available Variable: code_country, code_state, country, state
	 *                       You can use any of the available variables in the format string to get the desired output.
	 * @param string $output OBJECT|ARRAY_A Output Type
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function getCountries($format = 'country', $output = OBJECT) {
		$countries = [];
		foreach ($this->countries as $key => $value) {
			$countries[] = [
				'id' => $key,
				'name' => $value,
				'states' => isset($this->states[$key]) ? $this->states[$key] : []
			];
		}
		return FormatFactory::get('country', $countries, $format, ARRAY_A);
	}
	
	/**
	 * Get the list of states for a country
	 * If no country is specified, return all states
	 * If a country is specified, return the states for that country
	 * If the country is not found or no states, return an empty array
	 *
	 * @param string $format Output format. Default is 'country'
	 * @param string $output OBJECT|ARRAY_A Output Type
	 * @param string $country_code Country code (e.g., 'US')
	 *
	 * @return array
	 * @throws \Exception If a source is not valid
	 */
	public function getStates($format, $output = OBJECT, $country_code = null) {
		
		$countries = [];
		foreach ($this->countries as $key => $value) {
			$countries[] = [
				'id' => $key,
				'name' => $value,
				'states' => isset($this->states[$key]) ? $this->states[$key] : []
			];
		}
		
		// If no country is specified, return all states
		if (is_null($country_code)) {
			return FormatFactory::get('country', $countries, $format, $output);
		}

		// If no states are found, return an empty array
		if (!isset($this->states[$country_code])) {
			return [];
		}
		
		// Get the states for the specified country from $countries array
		foreach ($countries as $countryCode => $countryData) {
			if ($countryCode === $country_code) {
				return FormatFactory::get('country', $countryData, $format, $output);
			}
		}
		
		return [];
	}
	
	public function getProducts() {
		// TODO: Implement getProducts() method.
	}
	
	public function getProductCategories() {
		// TODO: Implement getProductCategories() method.
	}
	
	public function getProductTags() {
		// TODO: Implement getProductTags() method.
	}
	
	public function getProductAttributes() {
		// TODO: Implement getProductAttributes() method.
	}
	
	public function getProductVariations( $productId ) {
		// TODO: Implement getProductVariations() method.
	}
	
	public function getProductTypes() {
		// TODO: Implement getProductTypes() method.
	}
	
	public function getStockStatuses() {
		// TODO: Implement getStockStatuses() method.
	}
	
	public function getOrders() {
		// TODO: Implement getOrders() method.
	}
	
	public function getOrderStatuses() {
		// TODO: Implement getOrderStatuses() method.
	}
	
	public function getCustomers() {
		// TODO: Implement getCustomers() method.
	}
	
	public function getCustomerMeta( $customerId ) {
		// TODO: Implement getCustomerMeta() method.
	}
	
	public function getCoupons() {
		// TODO: Implement getCoupons() method.
	}
	
	public function getShippingMethods() {
		// TODO: Implement getShippingMethods() method.
	}
	
	public function getShippingZones() {
		// TODO: Implement getShippingZones() method.
	}
	
	public function getShippingZoneMethods( $zoneId ) {
		// TODO: Implement getShippingZoneMethods() method.
	}
	
	public function getPaymentGateways() {
		// TODO: Implement getPaymentGateways() method.
	}
	
	public function getTaxRates() {
		// TODO: Implement getTaxRates() method.
	}
	
	public function getTaxClasses() {
		// TODO: Implement getTaxClasses() method.
	}
	
	public function getSalesReports() {
		// TODO: Implement getSalesReports() method.
	}
	
	public function getTopSellers() {
		// TODO: Implement getTopSellers() method.
	}
}