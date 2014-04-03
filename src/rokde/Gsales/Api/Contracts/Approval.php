<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 03.04.14
 * Time: 15:49
 */

namespace Rokde\Gsales\Api\Contracts;


interface Approval {

	const NOT_APPROVED = 0;
	const APPROVED_FOR_MANUAL_PROCESSING = 1;
	const APPROVED_FOR_AUTOMATIC_PROCESSING = 2;

} 