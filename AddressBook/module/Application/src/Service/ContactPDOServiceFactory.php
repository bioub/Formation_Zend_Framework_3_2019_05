<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethodsHydrator;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\ContactPDOService;

class ContactPDOServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return ContactPDOService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $pdo = $container->get(\PDO::class);
        $hydrator = $container->get('HydratorManager')->get(ClassMethodsHydrator::class);

        return new ContactPDOService($pdo, $hydrator);
    }
}
