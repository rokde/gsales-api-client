<?php namespace Rokde\Gsales\Api\Console\Command\Offers;

use Rokde\Gsales\Api\Console\Command\ApiCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CountCommand
 *
 * @package Rokde\Gsales\Api\Console\Command\Offers
 */
class CountCommand extends ApiCommand
{
	/**
	 * command name
	 *
	 * @var string
	 */
	protected $commandName = 'offers:count';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = 'fetches the number of all offers';

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
		$offers = $this->apiClient->offer()->count();
		$output->writeln(sprintf('%s offers found', $offers));
	}
}