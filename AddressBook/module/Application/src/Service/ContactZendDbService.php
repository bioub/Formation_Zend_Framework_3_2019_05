<?php


namespace Application\Service;


use Application\Entity\Contact;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\Pdo\Statement;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\HydratorInterface;

class ContactZendDbService implements ContactServiceInterface
{
    /** @var AdapterInterface */
    protected $adapter;

    /** @var HydratorInterface */
    protected $hydrator;

    /**
     * ContactZendDbService constructor.
     * @param AdapterInterface $adapter
     * @param HydratorInterface $hydrator
     */
    public function __construct(AdapterInterface $adapter, HydratorInterface $hydrator)
    {
        $this->adapter = $adapter;
        $this->hydrator = $hydrator;
    }

    /** @return Contact[] */
    public function getAll(): array
    {
//        $sql = new Sql($this->adapter);
//
//        $select = $sql->select()
//            ->columns(['id', 'prenom', 'nom'])
//            ->from('contacts')
//            ->limit(100);
//
//        $statement = $sql->prepareStatementForSqlObject($select);
//        $results = $statement->execute();
        $tableGateway = new TableGateway('contacts', $this->adapter);

        $results = $tableGateway->select();

        $entities = [];

        foreach ($results->toArray() as $result) {
            $entities[] = $this->hydrator->hydrate($result, new Contact());
        }

        return $entities;
    }
}