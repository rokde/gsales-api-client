<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\RoleType;
use Rokde\Gsales\Api\Types\Sort;
use Rokde\Gsales\Api\Types\Type;
use Rokde\Gsales\Api\Types\User\Base;
use Rokde\Gsales\Api\Types\UserType;

/**
 * Class User
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class User extends Api
{
	/**
	 * fetches a single user by id
	 *
	 * @param int $userId
	 *
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
	 *
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
	 *
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
	 *
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
	 *
	 * @return UserType
	 */
	public function update(UserType $user)
	{
		$userId = $user->getId();

		return $this->call('updateUser', ['userid' => $userId, 'data' => $user]);
	}

	/**
	 * deletes an user
	 *
	 * @param int|UserType $user
	 *
	 * @return bool
	 */
	public function delete($user)
	{
		$userId = Type::getIdentifier($user);

		return $this->call('deleteUser', ['userid' => $userId]);
	}

	/**
	 * locks a user
	 *
	 * @param int|UserType $user
	 *
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
	 *
	 * @return \Rokde\Gsales\Api\Types\UserType
	 */
	public function unlock($user)
	{
		return $this->modifyState('unlockUser', 'userid', $user);
	}

	/**
	 * returns a collection of all roles
	 *
	 * @return \Rokde\Gsales\Api\Types\RoleType[]
	 */
	public function availableRoles()
	{
		return $this->call('getAvailableRoles');
	}

	/**
	 * returns roles for user
	 *
	 * @param int|UserType $user
	 *
	 * @return \Rokde\Gsales\Api\Types\RoleType[]
	 */
	public function roles($user)
	{
		$userId = Type::getIdentifier($user);

		return $this->call('getRolesOfUser', ['userid' => $userId]);
	}

	/**
	 * adds a role to user
	 *
	 * @param int|UserType $user
	 * @param int|RoleType $role
	 *
	 * @return \Rokde\Gsales\Api\Types\RoleType[]
	 */
	public function addRole($user, $role)
	{
		$userId = Type::getIdentifier($user);
		$roleId = Type::getIdentifier($role);

		return $this->call('addRoleToUser', ['userid' => $userId, 'roleid' => $roleId]);
	}

	/**
	 * removes a role from user
	 *
	 * @param int|UserType $user
	 * @param int|RoleType $role
	 *
	 * @return \Rokde\Gsales\Api\Types\RoleType[]
	 */
	public function removeRole($user, $role)
	{
		$userId = Type::getIdentifier($user);
		$roleId = Type::getIdentifier($role);

		return $this->call('removeRoleFromUser', ['userid' => $userId, 'roleid' => $roleId]);
	}
}