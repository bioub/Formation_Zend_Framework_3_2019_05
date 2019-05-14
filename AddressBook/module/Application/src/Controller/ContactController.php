<?php


namespace Application\Controller;


use Application\Service\ContactServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    /** @var ContactServiceInterface */
    protected $contactService;

    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    public function listAction()
    {
        return new ViewModel([
            'contacts' => $this->contactService->getAll(),
        ]);
    }

    public function showAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }


    public function updateAction()
    {
        return new ViewModel();
    }


    public function deleteAction()
    {
        return new ViewModel();
    }
}