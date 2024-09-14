<?php

namespace WebAppick\WPListInfo\Interfaces;

use WC_DateTime;

/**
 * Class InfoInterface
 *
 * @package WebAppick\WPListInfo\Interfaces
 * @subpackage WebAppick\WPListInfo\Interfaces
 */
interface InfoInterface {

	/**
	 * Retrieve information about a specific entity (post, product, user, etc.).
	 *
	 * @param int|object  $id The ID or Object for the entity.
	 * @param string|null $key The key for the entity.
     * @return array|bool|float|int|string|WC_DateTime|null An array of all or single information about the entity.
	 */
	public function getInfo( $id, $key = null );
	
	/**
	 * Retrieve a list of keys for the entity.
	 *
	 * @return array An array of keys for the entity.
	 */
	public function getKeys();

}
