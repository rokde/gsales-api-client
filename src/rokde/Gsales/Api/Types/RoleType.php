<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 12:19
 */

namespace Rokde\Gsales\Api\Types;


use Rokde\Gsales\Api\Contracts\IdentifierInterface;

class RoleType extends Type implements IdentifierInterface {

	/**
	 * @var int
	 */
	protected $id;
	/**
	 * @var string
	 */
	protected $name;
	/**
	 * @var string
	 */
	protected $description;

	/**
	 * returns Description
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
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
	 * returns Name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
}