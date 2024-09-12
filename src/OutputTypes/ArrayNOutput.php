<?php

namespace WebAppick\WPListInfo\OutputTypes;


use WebAppick\WPListInfo\Interfaces\OutputTypeInterface;

/**
 * Class ArrayNOutput
 *
 * @package WPListInfo
 * @subpackage WebAppick\WPListInfo\OutputTypes
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 */
class ArrayNOutput implements OutputTypeInterface {
	
	/**
	 * @inheritDoc
	 */
	public function transform( $data ) {
		return array_values($data); // Return only the values as a numeric array
	}
}