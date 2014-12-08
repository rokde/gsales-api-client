<?php namespace Rokde\Gsales\Api\Console\Command\Offers;

use Rokde\Gsales\Api\Console\Command\ApiCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GetCommand
 *
 * @package Rokde\Gsales\Api\Console\Command\Offers
 */
class GetCommand extends ApiCommand
{
	/**
	 * command name
	 *
	 * @var string
	 */
	protected $commandName = 'offers:get';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = 'fetches an offer by id';

	/**
	 * configures the command
	 */
	protected function configure()
	{
		$this->setName($this->commandName)
			->setDescription($this->description)
			->addArgument('id', InputArgument::REQUIRED, 'Offer id to fetch');
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
		$output->writeln('Retrieving offer data for id: ' . $id);

		$offer = $this->apiClient->offer()->get($id);

		$gross = money_format('%=*^-14#8.2i', $offer->getSum()->getGross());
		$output->writeln(sprintf('(ID:%s) %s: %s%s', $offer->getId(), $offer->getBase()->getCustomerCompany(), $gross, $offer->getBase()->getCurrencySymbol()));
	}
}