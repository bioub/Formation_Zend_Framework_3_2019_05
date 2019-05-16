<?php


namespace Application\Form;


use Application\Entity\Contact;
use Application\Entity\Societe;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element\DateSelect;
use Zend\Form\Element\Email;
use Zend\Form\Element\Tel;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\Hydrator\HydratorInterface;
use Zend\InputFilter\InputFilterInterface;

class ContactForm extends Form
{
    /**
     * ContactForm constructor.
     * @param HydratorInterface $hydrator
     * @param InputFilterInterface $inputFilter
     * @param ObjectManager $em
     */
    public function __construct(HydratorInterface $hydrator, InputFilterInterface $inputFilter, ObjectManager $em)
    {
        parent::__construct('contactForm');

        $this->setHydrator($hydrator);
        $this->setInputFilter($inputFilter);

        $this->setObject(new Contact());

        // en instanciant la classe
        $element = new Text('prenom');
        $element->setLabel('Prénom');

        $this->add($element);


        // via une factory
        $this->add([
            'type' => Text::class,
            'name' => 'nom',
            'options' => [
                'label' => 'Nom',
            ],
        ]);

        $element = new Email('email');
        $element->setLabel('Email');

        $this->add($element);

        $element = new Tel('telephone');
        $element->setLabel('Téléphone');

        $this->add($element);

        $element = new DateSelect('dateNaissance');
        $element->setLabel('Date de naissance');
        $element->setOptions([
            'min_year' => date('Y') - 120,
            'create_empty_option' => true,
        ]);

        $this->add($element);

        $element = new ObjectSelect('societe');
        $element->setOptions([
            'object_manager'     => $em,
            'target_class'       => Societe::class,
            'property'           => 'nom',
            'display_empty_item' => true,
            'empty_item_label'   => '-- Pas de société --',
        ]);

        $this->add($element);
    }


}