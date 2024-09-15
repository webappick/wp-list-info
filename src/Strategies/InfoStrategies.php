<?php

namespace WebAppick\WPListInfo\Strategies;


use WebAppick\WPListInfo\Interfaces\InfoInterface;

/**
 * Class InfoStrategies
 *
 * @package CTXFeed
 * @subpackage WebAppick\WPListInfo\Strategies
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category MyCategory
 */
class InfoStrategies {
	private $info;
	
	public function __construct(InfoInterface $info) {
		$this->info = $info;
	}
	
	public function getInfo($type, $key) {
		return $this->info->getInfo($type, $key);
	}
	
	public function getKeys() {
		return $this->info->getKeys();
	}
}