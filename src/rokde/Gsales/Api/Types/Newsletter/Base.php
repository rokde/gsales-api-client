<?php namespace Rokde\Gsales\Api\Types\Newsletter;

use Rokde\Gsales\Api\Types\Type;

/**
 * Class Base
 *
 * @package Rokde\Gsales\Api\Types\Newsletter
 */
class Base extends Type
{
	/**
	 * @var bool
	 */
	protected $useDefaultFrom;

	/**
	 * @var string
	 */
	protected $from_email;

	/**
	 * @var string
	 */
	protected $from_name;

	/**
	 * @var string
	 */
	protected $subject;

	/**
	 * @var string
	 */
	protected $body;

	/**
	 * @var string
	 */
	protected $body_plain;

	/**
	 * sets body
	 *
	 * @param string $body
	 *
	 * @return $this
	 */
	public function setBody($body)
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * returns Body
	 *
	 * @return string
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * sets body_plain
	 *
	 * @param string $body_plain
	 *
	 * @return $this
	 */
	public function setBodyPlain($body_plain)
	{
		$this->body_plain = $body_plain;
		return $this;
	}

	/**
	 * returns BodyPlain
	 *
	 * @return string
	 */
	public function getBodyPlain()
	{
		return $this->body_plain;
	}

	/**
	 * sets from_email
	 *
	 * @param string $from_email
	 *
	 * @return $this
	 */
	public function setFromEmail($from_email)
	{
		$this->from_email = $from_email;
		return $this;
	}

	/**
	 * returns FromEmail
	 *
	 * @return string
	 */
	public function getFromEmail()
	{
		return $this->from_email;
	}

	/**
	 * sets from_name
	 *
	 * @param string $from_name
	 *
	 * @return $this
	 */
	public function setFromName($from_name)
	{
		$this->from_name = $from_name;
		return $this;
	}

	/**
	 * returns FromName
	 *
	 * @return string
	 */
	public function getFromName()
	{
		return $this->from_name;
	}

	/**
	 * sets subject
	 *
	 * @param string $subject
	 *
	 * @return $this
	 */
	public function setSubject($subject)
	{
		$this->subject = $subject;
		return $this;
	}

	/**
	 * returns Subject
	 *
	 * @return string
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * sets useDefaultFrom
	 *
	 * @param boolean $useDefaultFrom
	 *
	 * @return $this
	 */
	public function setUseDefaultFrom($useDefaultFrom)
	{
		$this->useDefaultFrom = $useDefaultFrom;
		return $this;
	}

	/**
	 * returns UseDefaultFrom
	 *
	 * @return boolean
	 */
	public function getUseDefaultFrom()
	{
		return $this->useDefaultFrom;
	}
}