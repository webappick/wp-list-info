<?php

namespace WebAppick\WPListInfo\OutputTypes;


use WebAppick\WPListInfo\Interfaces\OutputTypeInterface;

/**
 * Class JsonOutput
 *
 * @package WPListInfo
 * @subpackage WebAppick\WPListInfo\OutputTypes
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 */
class JsonOutput implements OutputTypeInterface {
	
	/**
	 * @inheritDoc
	 */
	public function transform( $data ) {
		return json_encode($data); // Return data as a JSON string
	}
}