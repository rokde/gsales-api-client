<?php namespace Rokde\Gsales\Api\Types\User;

use Rokde\Gsales\Api\Types\Type;

/**
 * Class Base
 *
 * @package Rokde\Gsales\Api\Types\User
 */
class Base extends Type
{
	/**
	 * @var string
	 */
	protected $login;
	/**
	 * @var string
	 */
	protected $email;
	/**
	 * @var string
	 */
	protected $fullname;
	/**
	 * @var string
	 */
	protected $password;

	/**
	 * sets email
	 *
	 * @param string $email
	 *
	 * @return $this
	 */
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * returns Email
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * sets fullname
	 *
	 * @param string $fullname
	 *
	 * @return $this
	 */
	public function setFullname($fullname)
	{
		$this->fullname = $fullname;
		return $this;
	}

	/**
	 * returns Fullname
	 *
	 * @return string
	 */
	public function getFullname()
	{
		return $this->fullname;
	}

	/**
	 * sets login
	 *
	 * @param string $login
	 *
	 * @return $this
	 */
	public function setLogin($login)
	{
		$this->login = $login;
		return $this;
	}

	/**
	 * returns Login
	 *
	 * @return string
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * sets password
	 *
	 * @param string $password
	 *
	 * @return $this
	 */
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * returns Password
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}
}