<?php


namespace Application\Service;


use Application\Entity\Contact;

interface ContactServiceInterface
{
    /** @return Contact[] */
    public function getAll(): array;
}