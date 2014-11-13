<?php namespace Rokde\Gsales\Api\Types;

use Rokde\Gsales\Api\Contracts\IdentifierInterface;

/**
 * Class RoleType
 *
 * @package Rokde\Gsales\Api\Types
 */
class RoleType extends Type implements IdentifierInterface
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * returns Description
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * returns Id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * returns Name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
}