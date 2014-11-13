<?php namespace Rokde\Gsales\Api\Types;

use DateTime;

/**
 * Class Type
 *
 * @package Rokde\Gsales\Api\Types
 */
abstract class Type
{
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

	/**
	 * makes a DateTime instance from string
	 *
	 * @param string|DateTime $value
	 *
	 * @return DateTime
	 */
	protected function makeDateTimeProperty($value)
	{
		if ( ! $value instanceof DateTime) {
			$value = DateTime::createFromFormat('Y-m-d H:i:s', $value);
		}

		return $value;
	}
}