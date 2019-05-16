<?php


namespace Application\Controller;


use Application\Service\SocieteService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SocieteController extends AbstractActionController
{
    /** @var SocieteService */
    protected $societeService;

    public function __construct(SocieteService $societeService)
    {
        $this->societeService = $societeService;
    }

    public function listAction()
    {
        $societes = $this->societeService->getAll();

        return new ViewModel([
            'societes' => $societes,
        ]);
    }

    public function showAction()
    {
        $id = $this->params('id');
        $societe = $this->societeService->getById($id);

        if (!$societe) {
            return $this->notFoundAction();
        }

        return new ViewModel([
            'societe' => $societe,
        ]);
    }
}