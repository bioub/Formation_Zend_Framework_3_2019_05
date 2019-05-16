<?php

namespace Application\Controller;

use Application\Form\ContactForm;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ContactControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return ContactController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $service = $container->get(\Application\Service\ContactServiceInterface::class);
        $form = $container->get('FormElementManager')->get(ContactForm::class);

        return new ContactController($service, $form);
    }
}

