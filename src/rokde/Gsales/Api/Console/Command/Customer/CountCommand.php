<?php namespace Rokde\Gsales\Api\Console\Command\Customer;

use Rokde\Gsales\Api\Console\Command\ApiCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CountCommand
 *
 * @package Rokde\Gsales\Api\Console\Command\Customer
 */
class CountCommand extends ApiCommand
{
	/**
	 * command name
	 *
	 * @var string
	 */
	protected $commandName = 'customer:count';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = 'fetches the number of all customers';

	/**
	 * executes the command
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 *
	 * @return int|null|void
	 */
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$customers = $this->apiClient->customer()->count();
		$output->writeln(sprintf('%s customers found', $customers));
	}
}