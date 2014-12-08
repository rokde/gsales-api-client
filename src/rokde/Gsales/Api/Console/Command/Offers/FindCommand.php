<?php namespace Rokde\Gsales\Api\Console\Command\Offers;

use Rokde\Gsales\Api\Console\Command\ApiCommand;
use Rokde\Gsales\Api\Types\Filter;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class FindCommand
 *
 * @package Rokde\Gsales\Api\Console\Command\Offers
 */
class FindCommand extends ApiCommand
{
	/**
	 * command name
	 *
	 * @var string
	 */
	protected $commandName = 'offers:find';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = 'fetches an offer by term';

	/**
	 * configures the command
	 */
	protected function configure()
	{
		$this->setName($this->commandName)
			->setDescription($this->description)
			->addArgument('term', InputArgument::REQUIRED, 'Term to find an offer');
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
		$term = $input->getArgument('term');
		$output->writeln('Retrieving offer data for term: ' . $term);

		$offerFilter = array(
			new Filter('customer_company', $term, Filter::LIKE),
		);

		$offers = $this->apiClient->offer()->all($offerFilter);
		if (empty($offers)) {
			$output->writeln('No offers for term ' . $term . ' found.');
			return;
		}

		foreach ($offers as $offer) {
			$gross = money_format('%=*^-14#8.2i', $offer->getSum()->getGross());
			$output->writeln(sprintf('(ID:%s) %s: %s%s', $offer->getId(), $offer->getBase()->getCustomerCompany(), $gross, $offer->getBase()->getCurrencySymbol()));
		}
	}
}