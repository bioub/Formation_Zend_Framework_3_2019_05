<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class PDOFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return \PDO
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \PDO('mysql:host=localhost;dbname=addressbook', 'root');
    }
}
