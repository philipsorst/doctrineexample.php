<?php


namespace net\dontdrinkandroot\doctrineexample\orm;

use Doctrine\ORM\Tools\SchemaTool;
use \PDO;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class DoctrineOrmTestCase extends \PHPUnit_Extensions_Database_TestCase
{

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var PDO
     */
    protected $pdo;

    public function getConnection()
    {
        $this->pdo = new PDO('sqlite::memory:');

        $config = $this->getConfiguration();
        $connectionParams = array(
            'pdo' => $this->pdo
        );

        $this->entityManager = EntityManager::create($connectionParams, $config);

        $tool = new SchemaTool($this->entityManager);
        $classes = array(
            $this->entityManager->getClassMetadata('net\dontdrinkandroot\doctrineexample\entity\Article'),
            $this->entityManager->getClassMetadata('net\dontdrinkandroot\doctrineexample\entity\Tag')
        );
        $tool->createSchema($classes);

        return $this->createDefaultDBConnection($this->pdo);
    }

    public function getDataSet()
    {
        $databasePath = __DIR__ . "/../../../../data.xml";

        return $this->createXMLDataSet(realpath($databasePath));
    }

    protected function getConfiguration()
    {
        $config = Setup::createYAMLMetadataConfiguration(array(__DIR__ . "/../../../../../config/yaml", true));
        return $config;
    }

}