<?php


namespace Application\Controller;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

class ControllerAbstractFactory implements AbstractFactoryInterface
{

    /**
     * Can the factory create an instance for the service?
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        $result = preg_match('/^Application\\\\Controller\\\\([a-zA-Z0-9_-]+)Controller$/', $requestedName);

        return $result !== 0;
    }

    /**
     * Create an object
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $matches = [];
        preg_match('/^Application\\\\Controller\\\\([a-zA-Z0-9_-]+)Controller$/', $requestedName, $matches);

        $entity = $matches[1];

        $service = $container->get("Application\\Service\\{$entity}Service");

        return new $requestedName($service);
    }
}