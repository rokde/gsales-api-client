<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 15:24
 */

namespace Rokde\Gsales\Api\Contexts;


use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Sort;
use Rokde\Gsales\Api\Types\User\Base;
use Rokde\Gsales\Api\Types\UserType;

class User extends Api {

	/**
	 * fetches a single user by id
	 *
	 * @param int $userId
	 * @return \Rokde\Gsales\Api\Types\UserType
	 */
	public function get($userId)
	{
		return $this->getEntity('getUser', 'userid', $userId);
	}

	/**
	 * returns a collection of users, filtered, sorted, paginated
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 * @return \Rokde\Gsales\Api\Types\UserType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getUsers', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns the number of users returned by filter
	 *
	 * @param Filter[] $filter
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getUsersCount', $filter);
	}

	/**
	 * creates an user
	 *
	 * @param Base $user
	 * @return \Rokde\Gsales\Api\Types\UserType
	 */
	public function create(Base $user)
	{
		return $this->call('createUser', ['data' => $user]);
	}

	/**
	 * updates an user
	 *
	 * @param UserType $user
	 * @return UserType
	 */
	public function udpate(UserType $user)
	{
		$userId = $user->getId();

		return $this->call('updateUser', ['userid' => $userId, 'data' => $user]);
	}

	/**
	 * deletes an user
	 *
	 * @param int|UserType $user
	 * @return bool
	 */
	public function delete($user)
	{
		$userId = ($user instanceof UserType) ? $user->getId() : $user;

		return $this->call('deleteUser', ['userid' => $userId]);
	}

	/**
	 * locks a user
	 *
	 * @param int|UserType $user
	 * @return \Rokde\Gsales\Api\Types\UserType
	 */
	public function lock($user)
	{
		return $this->modifyState('lockUser', 'userid', $user);
	}

	/**
	 * unlocks a user
	 *
	 * @param int|UserType $user
	 * @return \Rokde\Gsales\Api\Types\UserType
	 */
	public function unlock($user)
	{
		return $this->modifyState('unlockUser', 'userid', $user);
	}
}