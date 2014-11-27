<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Contracts\Sub;
use Rokde\Gsales\Api\Types\Comment\Base;
use Rokde\Gsales\Api\Types\CommentType;
use Rokde\Gsales\Api\Types\Type;

/**
 * Class Comment
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class Comment extends Api
{
	/**
	 * fetches a single comment by id
	 *
	 * @param int $commentId
	 *
	 * @return \Rokde\Gsales\Api\Types\CommentType
	 */
	public function get($commentId)
	{
		return $this->getEntity('getComment', 'commentid', $commentId);
	}

	/**
	 * returns all comments for a given record
	 *
	 * @param string|Sub $sub
	 * @param int $recordId
	 *
	 * @return \Rokde\Gsales\Api\Types\CommentType[]
	 */
	public function all(Sub $sub, $recordId)
	{
		return $this->call('getComments', ['sub' => $sub, 'recordid' => $recordId]);
	}

	/**
	 * creates a new comment
	 *
	 * @param Base $comment
	 *
	 * @return \Rokde\Gsales\Api\Types\CommentType
	 */
	public function create(Base $comment)
	{
		return $this->call('createComment', ['filter' => $comment]);
	}

	/**
	 * deletes a comment
	 *
	 * @param int|\Rokde\Gsales\Api\Types\CommentType $comment
	 *
	 * @return bool
	 */
	public function delete($comment)
	{
		$commentId = Type::getIdentifier($comment);

		return $this->call('deleteComment', ['commentid' => $commentId]);
	}
}