<?php

namespace WebAppick\WPListInfo\OutputTypes;


use WebAppick\WPListInfo\Interfaces\OutputTypeInterface;

/**
 * Class ObjectKOutput
 *
 * @package WPListInfo
 * @subpackage WebAppick\WPListInfo\OutputTypes
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 */
class ObjectKOutput implements OutputTypeInterface {
	
	/**
	 * @inheritDoc
	 */
	public function transform( $data ) {
		$objects = [];
		foreach ($data as $key => $value) {
			$objects[$key] = (object) $value; // Convert each item to object with key
		}
		return $objects;
	}
}