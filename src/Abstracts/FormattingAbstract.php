<?php

namespace WebAppick\WPListInfo\Abstracts;

/**
 * Class FormattingAbstract
 *
 * @package WebAppick\WPListInfo\Interfaces
 * @subpackage WebAppick\WPListInfo\Interfaces
 */
abstract class FormattingAbstract {

	/**
	 *  Format the data according to the structure
     *
	 * @param array        $data Data to be formatted
	 * @param string|array $format Output format
	 * @param string       $output OBJECT|ARRAY_A Output Type
	 * @return mixed
	 */
	abstract public function format( $data, $format, $output );

}
