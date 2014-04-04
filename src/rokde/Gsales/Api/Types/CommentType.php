<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 11:49
 */

namespace Rokde\Gsales\Api\Types;


use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Types\Comment\Base;

class CommentType extends Base implements IdentifierInterface
{
	/**
	 * @var int
	 */
	protected $id;
	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $created;
	/**
	 * @var int
	 */
	protected $user_id;
	/**
	 * @var string
	 */
	protected $username;
	/**
	 * @var int
	 */
	protected $deleted = 0;
	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $deletedon;
	/**
	 * @var string
	 */
	protected $deleteduser;
	/**
	 * @var int
	 */
	protected $stared;

	/**
	 * returns Created
	 *
	 * @param bool $formatted
	 * @return string|DateTime
	 */
	public function getCreated($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->created);

		return $this->created;
	}

	/**
	 * returns Deleted
	 *
	 * @return bool
	 */
	public function isDeleted()
	{
		return ($this->deleted == 1);
	}

	/**
	 * returns Deletedon
	 *
	 * @param bool $formatted
	 * @return string|DateTime
	 */
	public function getDeleted($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->deletedon);

		return $this->deletedon;
	}

	/**
	 * returns Deleted user
	 *
	 * @return string
	 */
	public function getDeletedUser()
	{
		return $this->deleteduser;
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
	 * returns Stared
	 *
	 * @return int
	 */
	public function getStared()
	{
		return $this->stared;
	}

	/**
	 * returns UserId
	 *
	 * @return int
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * returns Username
	 *
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}
}