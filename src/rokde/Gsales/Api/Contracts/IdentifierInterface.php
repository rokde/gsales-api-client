<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 03.04.14
 * Time: 13:07
 */

namespace Rokde\Gsales\Api\Contracts;


interface IdentifierInterface {

	/**
	 * returns an unique identifier for the object
	 *
	 * @return int
	 */
	public function getId();
} 