<?php namespace Rokde\Gsales\Api\Types;

use InvalidArgumentException;

/**
 * Class Filter
 *
 * @package Rokde\Gsales\Api\Types
 */
class Filter extends Type {
	/**
	 * like operator
	 */
	const LIKE = 'like';
	/**
	 * not like operator
	 */
	const NOT_LIKE = 'notlike';
	/**
	 * greater than operator
	 */
	const GREATER_THAN = 'bigger';
	/**
	 * less than operator
	 */
	const LESS_THAN = 'smaller';
	/**
	 * is operator
	 */
	const IS = 'is';
	/**
	 * is not operator
	 */
	const IS_NOT = 'isnot';

	/**
	 * @var
	 */
	private $field;

	/**
	 * @var
	 */
	private $operator;

	/**
	 * @var
	 */
	private $value;

	/**
	 * @param string $field
	 * @param mixed $value
	 * @param string $operator
	 */
	public function __construct($field, $value, $operator = self::LIKE)
	{
		$this->setField($field);
		$this->setValue($value);
		$this->setOperator($operator);
	}

	/**
	 * @param mixed $operator
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setOperator($operator)
	{
		$operators = [self::GREATER_THAN, self::IS, self::IS_NOT, self::LESS_THAN, self::LIKE, self::NOT_LIKE];
		if (!in_array($operator, $operators))
		{
			throw new InvalidArgumentException('Operator has to be one of ' . implode(', ', $operators));
		}

		$this->operator = $operator;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getOperator()
	{
		return $this->operator;
	}

	/**
	 * @param mixed $value
	 * @return $this
	 */
	public function setValue($value)
	{
		$this->value = $value;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param mixed $field
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