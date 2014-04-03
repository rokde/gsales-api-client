<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 01.04.14
 * Time: 17:56
 */

namespace Rokde\Gsales\Api\Types;


use InvalidArgumentException;

class Filter extends Type {

	/**
	 *
	 */
	const LIKE = 'like';
	/**
	 *
	 */
	const NOT_LIKE = 'notlike';
	/**
	 *
	 */
	const GREATER_THAN = 'bigger';
	/**
	 *
	 */
	const LESS_THAN = 'smaller';
	/**
	 *
	 */
	const IS = 'is';
	/**
	 *
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