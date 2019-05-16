<?php


namespace Application\Service;


use Application\Entity\Societe;
use Doctrine\ORM\EntityManager;

class SocieteService
{
    /** @var EntityManager */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function getAll()
    {
        $repo = $this->em->getRepository(Societe::class);

        return $repo->findBy([], ['nom' => 'ASC'], 100);
    }

    public function getById($id)
    {
        $repo = $this->em->getRepository(Societe::class);

        return $repo->find($id);
    }
}