<?php

$container = new \Zend\ServiceManager\ServiceManager();

$container->setFactory('filewriter', function() {
    return new \Orsys\Writer\FileWriter(__DIR__ . '/../logs/app.log');
});

$container->setFactory(\Psr\Log\LoggerInterface::class, function(\Zend\ServiceManager\ServiceLocatorInterface $sm) {
    $writer = $sm->get('filewriter');
    return new \Orsys\Logger\Logger($writer);
});

$container->setFactory(\Orsys\Writer\NullWriter::class, \Zend\ServiceManager\Factory\InvokableFactory::class);

return $container;

