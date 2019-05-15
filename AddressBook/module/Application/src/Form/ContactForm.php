<?php


namespace Application\Form;


use Zend\Form\Element\DateSelect;
use Zend\Form\Element\Email;
use Zend\Form\Element\Tel;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class ContactForm extends Form
{
    public function __construct($name = null, $options = [])
    {
        parent::__construct('contactForm');

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
        ]);

        $this->add($element);
    }

}