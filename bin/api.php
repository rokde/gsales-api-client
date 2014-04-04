#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 13:41
 */
require_once '../vendor/autoload.php';

use \Rokde\Gsales\Api\Console\Command as ConsoleCommands;

$config = include('../config.php');
$wsdl = $config['gsales']['wsdl'];
$apikey = $config['gsales']['apikey'];

$client = new \Rokde\Gsales\Api\Client($wsdl, $apikey);

$application = new \Symfony\Component\Console\Application('gsales.api.console', '0.0.1');
$application->add(new ConsoleCommands\Customer\GetCommand($client));
$application->add(new ConsoleCommands\Customer\ListCommand($client));
$application->add(new ConsoleCommands\Customer\CountCommand($client));
$application->run();
