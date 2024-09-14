<?php

namespace WebAppick\WPListInfo\Interfaces;

/**
 * Class OutputTypeInterface
 *
 * @package WebAppick\WPListInfo\Interfaces
 * @subpackage WebAppick\WPListInfo\Interfaces
 */
interface OutputTypeInterface {

	/**
	 *  Output the data
     *
	 * @param array|string|object $data Data to output
	 * @return mixed
	 */
	public function transform( $data );

}
