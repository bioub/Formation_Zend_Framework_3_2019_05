<?php

// FQN ou FQCN Fully Qualified Class Name
// ex: \Orsys\Logger\Logger
require_once __DIR__ . '/../vendor/autoload.php';

$container = require_once __DIR__ . '/services.php';

/** @var \Orsys\Logger\Logger $logger */
$logger = $container->get(\Psr\Log\LoggerInterface::class);
$logger->warning('Test');

$nullWriter = $container->get(\Orsys\Writer\NullWriter::class);
$nullWriter->write('Fait rien');


$logger->log('warning', 'Exemple');
$logger('warning', 'Exemple');