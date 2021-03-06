<?php

namespace Application\Repository;

/**
 * ContactRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContactRepository extends \Doctrine\ORM\EntityRepository
{
    public function findWithSociete($id)
    {
        // SQL, QueryBuilder, DQL

        $dql = "SELECT c, s FROM Application\Entity\Contact c 
                LEFT JOIN c.societe s WHERE c.id = :id";

        return $this->_em->createQuery($dql)
            ->setParameter('id', $id)
            ->getOneOrNullResult();
    }
}
