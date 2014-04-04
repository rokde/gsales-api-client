<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 13:58
 */

namespace Rokde\Gsales\Api\Console\Command;


use Rokde\Gsales\Api\Client;
use Symfony\Component\Console\Command\Command;

abstract class ApiCommand extends Command {

	/**
	 * name of the command
	 *
	 * @var string
	 */
	protected $commandName = '';

	/**
	 * description of the command
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * api client
	 *
	 * @var \Rokde\Gsales\Api\Client
	 */
	protected $apiClient;

	/**
	 * @param Client $apiClient
	 * @param string $name
	 */
	public function __construct(Client $apiClient, $name = null)
	{
		$this->apiClient = $apiClient;

		parent::__construct($name);
	}

	/**
	 * configures the command
	 */
	protected function configure()
	{
		$this->setName($this->commandName)
			->setDescription($this->description);
	}
}