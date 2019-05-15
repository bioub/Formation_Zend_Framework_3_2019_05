<?php


namespace Application\Service;


use Application\Entity\Contact;
use Doctrine\ORM\EntityManager;

class ContactDoctrineService implements ContactServiceInterface
{
    /** @var EntityManager */
    protected $em;

    /**
     * ContactDoctrineService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /** @return Contact[] */
    public function getAll(): array
    {
        $repo = $this->em->getRepository(Contact::class);

        return $repo->findAll();
    }

    public function getById($id): Contact
    {
        $repo = $this->em->getRepository(Contact::class);

        return $repo->find($id);
    }

    public function insert($contact)
    {
        $this->em->persist($contact);
        $this->em->flush();
    }
}