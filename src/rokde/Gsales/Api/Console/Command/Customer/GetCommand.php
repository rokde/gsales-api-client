<?php namespace Rokde\Gsales\Api\Console\Command\Customer;

use Rokde\Gsales\Api\Console\Command\ApiCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GetCommand
 *
 * @package Rokde\Gsales\Api\Console\Command\Customer
 */
class GetCommand extends ApiCommand
{
	/**
	 * command name
	 *
	 * @var string
	 */
	protected $commandName = 'customer:get';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = 'fetches a customer by id';

	/**
	 * configures the command
	 */
	protected function configure()
	{
		$this->setName($this->commandName)
			->setDescription($this->description)
			->addArgument('id', InputArgument::REQUIRED, 'Customer id to fetch');
	}

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
		$id = $input->getArgument('id');
		$output->writeln('Retrieving customer data for id: ' . $id);

		$customer = $this->apiClient->customer()->get($id);
		$output->writeln(sprintf('(ID:%s) %s %s', $customer->getId(), $customer->getCompanyLabel(), $customer->getEmail()));
	}
}