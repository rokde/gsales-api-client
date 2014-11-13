<?php namespace Rokde\Gsales\Api\Types\Comment;

use Rokde\Gsales\Api\Types\Type;

/**
 * Class Base
 *
 * @package Rokde\Gsales\Api\Types\Comment
 */
class Base extends Type
{
	/**
	 * @var string
	 */
	protected $sub;

	/**
	 * @var int
	 */
	protected $recordid;

	/**
	 * @var string
	 */
	protected $comment;

	/**
	 * sets comment
	 *
	 * @param string $comment
	 *
	 * @return $this
	 */
	public function setComment($comment)
	{
		$this->comment = $comment;
		return $this;
	}

	/**
	 * returns Comment
	 *
	 * @return string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * sets record id
	 *
	 * @param int $recordid
	 *
	 * @return $this
	 */
	public function setRecordId($recordid)
	{
		$this->recordid = $recordid;
		return $this;
	}

	/**
	 * returns Record id
	 *
	 * @return int
	 */
	public function getRecordId()
	{
		return $this->recordid;
	}

	/**
	 * sets sub
	 *
	 * @param string $sub
	 *
	 * @return $this
	 */
	public function setSub($sub)
	{
		$this->sub = $sub;
		return $this;
	}

	/**
	 * returns Sub
	 *
	 * @return string
	 */
	public function getSub()
	{
		return $this->sub;
	}
}