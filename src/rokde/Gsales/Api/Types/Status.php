<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 01.04.14
 * Time: 15:35
 */

namespace Rokde\Gsales\Api\Types;


class Status extends Type {

	/**
	 * @var int
	 */
	private $code = 0;

	/**
	 * @var string
	 */
	private $message = '';

	/**
	 * @return bool
	 */
	public function isSuccessful()
	{
		return $this->code == 0;
	}

	/**
	 * @return int
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}
} 