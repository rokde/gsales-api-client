<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 10:28
 */

namespace Rokde\Gsales\Api\Types\Offer;


use DateTime;
use Rokde\Gsales\Api\Types\Base\Filterable;

class BaseFilterable extends Filterable {

	/**
	 * @var string date(Y-m-d)
	 */
	protected $validuntil;

	/**
	 * sets valid until
	 *
	 * @param string $validuntil
	 * @return $this
	 */
	public function setValidUntil($validuntil)
	{
		$this->validuntil = $validuntil;
		return $this;
	}

	/**
	 * returns Valid until
	 *
	 * @param bool $formatted
	 * @return string|DateTime
	 */
	public function getValidUntil($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d', $this->validuntil)->setTime(0, 0, 0);

		return $this->validuntil;
	}
} 