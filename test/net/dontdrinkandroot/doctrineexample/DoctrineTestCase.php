<?php

namespace net\dontdrinkandroot\doctrineexample;


use Doctrine\DBAL\Connection;
use \PDO;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class DoctrineTestCase extends \PHPUnit_Extensions_Database_TestCase
{

    /**
     * @var Connection
     */
    protected $connection;

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

        $this->connection = DriverManager::getConnection($connectionParams, $config);

        $createSql =
            "CREATE TABLE IF NOT EXISTS `Article` ( " .
                "`id` INTEGER NOT NULL, " .
                "`name` TEXT NOT NULL, " .
                "`price` FLOAT NOT NULL, " .
                "PRIMARY KEY (`id`) " .
            ");";
        $this->pdo->query($createSql);

        return $this->createDefaultDBConnection($this->pdo);
    }

    public function getDataSet()
    {
        $databasePath = __DIR__ . "/../../../data.xml";

        return $this->createXMLDataSet(realpath($databasePath));
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }
}