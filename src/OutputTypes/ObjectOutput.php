<?php

namespace WebAppick\WPListInfo\OutputTypes;


use WebAppick\WPListInfo\Interfaces\OutputTypeInterface;

/**
 * Class ObjectOutput
 *
 * @package WebAppick\WPListInfo\Services
 * @subpackage WebAppick\WPListInfo\OutputTypes
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 */
class ObjectOutput implements OutputTypeInterface {
	
	/**
	 * @inheritDoc
	 */
	public function transform( $data ) {
		$objects = [];
		foreach ($data as $key => $value) {
			$objects[] = (object) ['key' => $key, 'value' => $value]; // Convert each item to object
		}
		return $objects;
	}
}