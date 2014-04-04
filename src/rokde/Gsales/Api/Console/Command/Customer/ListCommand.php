<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 14:13
 */

namespace Rokde\Gsales\Api\Console\Command\Customer;


use Rokde\Gsales\Api\Console\Command\ApiCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends ApiCommand {

	protected $commandName = 'customer:list';
	protected $description = 'fetches all customers';

	/**
	 * executes the command
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int|null|void
	 */
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$customers = $this->apiClient->customer()->all();
		foreach ($customers as $customer)
		{
			$output->writeln(sprintf('(ID:%s) %s %s', $customer->getId(), $customer->getCompanyLabel(), $customer->getEmail()));
		}
	}

}