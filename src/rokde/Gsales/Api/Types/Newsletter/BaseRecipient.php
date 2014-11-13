<?php namespace Rokde\Gsales\Api\Types\Newsletter;

use Rokde\Gsales\Api\Types\Type;

/**
 * Class BaseRecipient
 *
 * @package Rokde\Gsales\Api\Types\Newsletter
 */
class BaseRecipient extends Type
{
	/**
	 * @var string
	 */
	protected $to_name;

	/**
	 * @var string
	 */
	protected $to_email;

	/**
	 * sets email
	 *
	 * @param string $to_email
	 *
	 * @return $this
	 */
	public function setEmail($to_email)
	{
		$this->to_email = $to_email;
		return $this;
	}

	/**
	 * returns Email
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->to_email;
	}

	/**
	 * sets name
	 *
	 * @param string $to_name
	 *
	 * @return $this
	 */
	public function setName($to_name)
	{
		$this->to_name = $to_name;
		return $this;
	}

	/**
	 * returns Name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->to_name;
	}
}