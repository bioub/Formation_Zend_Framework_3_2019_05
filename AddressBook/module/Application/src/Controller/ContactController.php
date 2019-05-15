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
        $id = $this->params('id');

        $contact = $this->contactService->getById($id);

        return new ViewModel([
            'contact' => $contact,
        ]);
    }

    public function addAction()
    {
        // TODO créer la fabrique et l'enregistrer (form_element_manager)
        $contactForm = new ContactForm();
        $contactForm->setHydrator(new ClassMethods()); // TODO injecter l'hydrateur DoctrineObject

        $contact = new Contact();
        $contactForm->setObject($contact);

        if ($this->request->isPost()) {
            $data = $this->request->getPost();

            $contactForm->setData($data);

            if ($contactForm->isValid()) {
                // TODO
                $contact->setDateNaissance(new \DateTime($contact->getDateNaissance()));

                $this->contactService->insert($contact);

                $this->flashMessenger()->addSuccessMessage('Le contact a bien été créé');

                return $this->redirect()->toRoute('contact');
            }
        }

        // OBLIGATOIRE pour le DateSelect
        $contactForm->prepare();

        return new ViewModel([
            'contactForm' => $contactForm,
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