<?php namespace Rokde\Gsales\Api\Types;

use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;

/**
 * Class Type
 *
 * @package Rokde\Gsales\Api\Types
 */
abstract class Type implements \JsonSerializable
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
	public static function getIdentifier($type)
	{
		if ($type instanceof IdentifierInterface)
			return $type->getId();

		return $type;
	}

    /**
     * serialize object to json
     *
     * @return array|mixed
     */
    public function jsonSerialize() {
        return $this->toDataObj($this);
    }

    /**
     * serialize object to json recursively
     *
     * @param $object
     * @return array
     */
    public function toDataObj($object) {
        $ref = new \ReflectionClass($object);
        $data = array();
        /** @var \ReflectionMethod $method */
        foreach (array_values($ref->getMethods()) as $method) {
            if ((0 === strpos($method->name, "get") || 0 === strpos($method->name, "is")) && $method->isPublic()) {

                if (0 === strpos($method->name, "get")) {
                    $name = substr($method->name, 3);
                }
                elseif (0 === strpos($method->name, "is")) {
                    $name = substr($method->name, 2);
                }

                if ($name != 'Identifier') {
                    $name[0] = strtolower($name[0]);
                    $value = $method->invoke($object);

                }
                if ("object" === gettype($value)) {
//                    $value = $this->toDataObj($value);
                }

                $data[$name] = $value;
            }
        }

        return $data;
    }
}