<?php


namespace Application\InputFilter;


use Application\Filter\DateTimeFilter;
use Zend\Filter\StringTrim;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class ContactInputFilter extends InputFilter
{
    public function init()
    {
        $input = new Input('prenom');

        $filter = new StringTrim();
        $input->getFilterChain()->attach($filter);

        $validator = new NotEmpty();
        $validator->setMessage('Le prénom est obligatoire', NotEmpty::IS_EMPTY);
        $input->getValidatorChain()->attach($validator);

        $this->add($input);

        $input = new Input('dateNaissance');

        $filter = new DateTimeFilter();
        $input->getFilterChain()->attach($filter);

        $this->add($input);
    }
}