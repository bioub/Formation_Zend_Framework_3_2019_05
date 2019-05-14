<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Hydrator\ClassMethodsHydrator;
use Zend\ServiceManager\Factory\FactoryInterface;

class ContactZendDbServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return ContactZendDbService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get(AdapterInterface::class);
        $hydrator = $container->get('HydratorManager')->get(ClassMethodsHydrator::class);

        return new ContactZendDbService($adapter, $hydrator);
    }
}
