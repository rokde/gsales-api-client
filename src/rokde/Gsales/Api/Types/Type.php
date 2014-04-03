<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 01.04.14
 * Time: 15:35
 */

namespace Rokde\Gsales\Api\Types;


use DateTime;

abstract class Type {

	/**
	 * sets the property of a type during soap call response
	 *
	 * @param string $property
	 * @param mixed $value
	 */
	public function __set($property, $value)
	{
		$this->$property = $value;
	}

	protected function makeDateTimeProperty($value)
	{
		if (! $value instanceof DateTime)
		{
			$value = DateTime::createFromFormat('Y-m-d H:i:s', $value);
		}

		return $value;
	}
} 