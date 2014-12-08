<?php namespace Rokde\Gsales\Api\Console\Command\Offers;

use Rokde\Gsales\Api\Console\Command\ApiCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ListCommand
 *
 * @package Rokde\Gsales\Api\Console\Command\Offers
 */
class ListCommand extends ApiCommand
{
	/**
	 * command name
	 *
	 * @var string
	 */
	protected $commandName = 'offers:list';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = 'fetches all offers';

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
		$offers = $this->apiClient->offer()->all();
		foreach ($offers as $offer) {
			$gross = money_format('%=*^-14#8.2i', $offer->getSum()->getGross());
			$output->writeln(sprintf('(ID:%s) %s: %s%s', $offer->getId(), $offer->getBase()->getCustomerCompany(), $gross, $offer->getBase()->getCurrencySymbol()));
		}
	}
}