<?php namespace Rokde\Gsales\Api\Types;

use InvalidArgumentException;

/**
 * Class Sort
 *
 * @package Rokde\Gsales\Api\Types
 */
class Sort extends Type
{
	/**
	 * sort directions
	 */
	const ASC = 'ASC';
	const DESC = 'DESC';

	/**
	 * @var
	 */
	private $field;

	/**
	 * @var
	 */
	private $direction;

	/**
	 * @param string $field
	 * @param string $direction
	 */
	public function __construct($field, $direction = self::ASC)
	{
		$this->setField($field);
		$this->setDirection($direction);
	}

	/**
	 * @return $this
	 */
	public function ascending()
	{
		return $this->setDirection(self::ASC);
	}

	/**
	 * @return $this
	 */
	public function descending()
	{
		return $this->setDirection(self::DESC);
	}

	/**
	 * @param string $direction
	 *
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setDirection($direction)
	{
		if ( ! in_array($direction, [self::ASC, self::DESC])) {
			throw new InvalidArgumentException('Direction has to be ' . self::ASC . ' or ' . self::DESC);
		}

		$this->direction = $direction;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDirection()
	{
		return $this->direction;
	}

	/**
	 * @param mixed $field
	 *
	 * @return $this
	 */
	public function setField($field)
	{
		$this->field = $field;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getField()
	{
		return $this->field;
	}
}