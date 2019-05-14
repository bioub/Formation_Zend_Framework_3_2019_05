<?php


namespace Application\Controller;


use Application\Service\ContactPDOService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    /** @var ContactPDOService */
    protected $contactService;

    public function __construct(ContactPDOService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function listAction()
    {
        var_dump(
            $this->contactService->getAll()
        );

        return new ViewModel();
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