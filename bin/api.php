#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 13:41
 */
require_once '../vendor/autoload.php';

$config = include('../config.php');
$wsdl = $config['gsales']['wsdl'];
$apikey = $config['gsales']['apikey'];

$client = new \Rokde\Gsales\Api\Client($wsdl, $apikey);

$application = new \Symfony\Component\Console\Application('gsales.api.console', '0.0.1');
$application->add(new \Rokde\Gsales\Api\Console\Command\Customer\GetCommand($client));
$application->add(new \Rokde\Gsales\Api\Console\Command\Customer\ListCommand($client));
$application->add(new \Rokde\Gsales\Api\Console\Command\Customer\CountCommand($client));
$application->run();
