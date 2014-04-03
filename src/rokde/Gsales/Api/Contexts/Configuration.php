<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 15:26
 */

namespace Rokde\Gsales\Api\Contexts;


use Rokde\Gsales\Api\Exceptions\ApiException;

class Configuration extends Api {

	/**
	 * returns a configuration value
	 *
	 * @param string $key
	 * @throws \Rokde\Gsales\Api\Exceptions\ApiException when configuration item is unknown or not accessible via api
	 * @return string
	 */
	public function get($key)
	{
		$result = $this->call('getConfigurationValue', ['configkey' => $key]);

		switch ($result)
		{
			case -1:
				throw new ApiException('Configuration key is unknown', -1);
			case -2:
				throw new ApiException('Configuration value is not accessible via api', -2);
		}

		return $result;
	}
}