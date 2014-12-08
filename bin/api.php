#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Rokde\Gsales\Api\Console\Command as ConsoleCommands;

$config = include(__DIR__ . '/../config.php');
$wsdl = $config['gsales']['wsdl'];
$apikey = $config['gsales']['apikey'];

$client = new \Rokde\Gsales\Api\Client($wsdl, $apikey);

$application = new \Symfony\Component\Console\Application('gsales.api.console', '0.0.1');

/** customer related */
$application->add(new ConsoleCommands\Customer\GetCommand($client));
$application->add(new ConsoleCommands\Customer\ListCommand($client));
$application->add(new ConsoleCommands\Customer\CountCommand($client));

/** offers related */
$application->add(new ConsoleCommands\Offers\GetCommand($client));
$application->add(new ConsoleCommands\Offers\ListCommand($client));
$application->add(new ConsoleCommands\Offers\CountCommand($client));
$application->add(new ConsoleCommands\Offers\FindCommand($client));

$application->run();
