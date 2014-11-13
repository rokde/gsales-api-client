<?php namespace Rokde\Gsales\Api\Types;

use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;

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

	/**
	 * returns the id for given object
	 *
	 * @param int|IdentifierInterface $type
	 *
	 * @return int
	 */
	public static function getId($type)
	{
		if ($type instanceof IdentifierInterface)
			return $type->getId();

		return $type;
	}
}