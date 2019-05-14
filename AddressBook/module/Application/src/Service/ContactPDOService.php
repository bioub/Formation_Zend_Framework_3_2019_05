<?php


namespace Application\Service;


class ContactPDOService
{
    /** @var \PDO */
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        /*
         [
            ['id' => '1', 'prenom' => 'Steve'],
            ['id' => '2', 'prenom' => 'Bill'],
        ]
         */

        $sql = 'SELECT id, prenom, nom FROM contacts LIMIT 0, 100';

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}