<?php namespace Rokde\Gsales\Api\Types;

use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Types\User\Base;

/**
 * Class UserType
 *
 * @package Rokde\Gsales\Api\Types
 */
class UserType extends Base implements IdentifierInterface
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var int
	 */
	protected $locked = 0;

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
	 * returns Locked
	 *
	 * @return bool
	 */
	public function isLocked()
	{
		return ($this->locked == 1);
	}
}