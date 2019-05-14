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
        $configPdo = $container->get('config')['pdo'];

        return new \PDO(
            "mysql:host=$configPdo[host];dbname=$configPdo[dbname]",
            $configPdo['username'],
            $configPdo['password']
        );
    }
}
