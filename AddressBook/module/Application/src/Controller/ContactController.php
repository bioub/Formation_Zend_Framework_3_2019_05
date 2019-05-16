<?php


namespace Application\Controller;


use Application\Entity\Contact;
use Application\Form\ContactForm;
use Application\Service\ContactServiceInterface;
use Zend\Http\Request;
use Zend\Hydrator\ClassMethods;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    /** @var Request */
    protected $request;

    /** @var ContactServiceInterface */
    protected $contactService;

    /** @var ContactForm */
    protected $contactForm;

    /**
     * ContactController constructor.
     * @param ContactServiceInterface $contactService
     * @param ContactForm $contactForm
     */
    public function __construct(ContactServiceInterface $contactService, ContactForm $contactForm)
    {
        $this->contactService = $contactService;
        $this->contactForm = $contactForm;
    }


    public function listAction()
    {
        return new ViewModel([
            'contacts' => $this->contactService->getAll(),
        ]);
    }

    public function showAction()
    {
        $id = $this->params('id');

        $contact = $this->contactService->getById($id);

        return new ViewModel([
            'contact' => $contact,
        ]);
    }

    public function addAction()
    {
        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $this->contactForm->setData($data);

            if ($this->contactForm->isValid()) {
                $contact = $this->contactForm->getObject();

                $this->contactService->insert($contact);

                $this->flashMessenger()->addSuccessMessage('Le contact a bien été créé');

                return $this->redirect()->toRoute('contact');
            }
        }

        // OBLIGATOIRE pour le DateSelect
        $this->contactForm->prepare();

        return new ViewModel([
            'contactForm' => $this->contactForm,
        ]);
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