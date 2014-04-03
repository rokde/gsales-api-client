<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 03.04.14
 * Time: 16:49
 */

namespace Rokde\Gsales\Api\Contracts;


interface MailFormat {

	const HTML_AND_PLAINTEXT = 0;
	const PLAINTEXT_ONLY = 1;
	const HTML_ONLY = 2;

} 