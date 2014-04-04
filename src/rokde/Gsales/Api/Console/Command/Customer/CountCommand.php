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

class CountCommand extends ApiCommand {

	protected $commandName = 'customer:count';
	protected $description = 'fetches the number of all customers';

	/**
	 * executes the command
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int|null|void
	 */
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$customers = $this->apiClient->customer()->count();
		$output->writeln(sprintf('%s customers found', $customers));
	}
}