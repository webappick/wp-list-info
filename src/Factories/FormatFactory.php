<?php

namespace WebAppick\WPListInfo\Factories;


use WebAppick\WPListInfo\Formatters\CountryFormatter;

/**
 * Class FormatFactory
 *
 * @package WPListInfo
 * @subpackage WebAppick\WPListInfo\Factories
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 * @license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 */
class FormatFactory {
	/**
	 * @throws \Exception
	 */
	public static function get($source, ...$params) {
		switch ($source) {
			case 'country':
				$service = new CountryFormatter();
				break;
			default:
				throw new \RuntimeException("Invalid source provided. Source $source does not exist.");
		}
		
		// Dynamically call the method on the service using the listType as the method name
		$method = 'format';
		if (method_exists($service, $method)) {
			return call_user_func_array([$service, $method], $params);
		}
		
		throw new \RuntimeException("Invalid list type: Method $method does not exist.");
	}
}