<?php namespace Rokde\Gsales\Api\Console\Command\Customer;

use Rokde\Gsales\Api\Console\Command\ApiCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ListCommand
 *
 * @package Rokde\Gsales\Api\Console\Command\Customer
 */
class ListCommand extends ApiCommand
{
	/**
	 * command name
	 *
	 * @var string
	 */
	protected $commandName = 'customer:list';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = 'fetches all customers';

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
		$customers = $this->apiClient->customer()->all();
		foreach ($customers as $customer) {
			$output->writeln(sprintf('(ID:%s) %s %s', $customer->getId(), $customer->getCompanyLabel(), $customer->getEmail()));
		}
	}
}