<?php


namespace Application\Service;


use Application\Entity\Contact;
use Zend\Hydrator\HydratorInterface;

class ContactPDOService implements ContactServiceInterface
{
    /** @var \PDO */
    protected $pdo;

    /** @var HydratorInterface */
    protected $hydrator;

    /**
     * ContactPDOService constructor.
     * @param \PDO $pdo
     * @param HydratorInterface $hydrator
     */
    public function __construct(\PDO $pdo, HydratorInterface $hydrator = null)
    {
        $this->pdo = $pdo;
        $this->hydrator = $hydrator;
    }

    public function getAll(): array
    {
        /*
         [
            ['id' => '1', 'prenom' => 'Steve'],
            ['id' => '2', 'prenom' => 'Bill'],
        ]
         */

        $sql = 'SELECT id, prenom, nom, email, telephone FROM contacts LIMIT 0, 100';

        $stmt = $this->pdo->query($sql);

        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (!$this->hydrator) {
            return $results;
        }

        $entities = [];

        foreach ($results as $result) {
            $entities[] = $this->hydrator->hydrate($result, new Contact());
        }

        return $entities;
    }
}