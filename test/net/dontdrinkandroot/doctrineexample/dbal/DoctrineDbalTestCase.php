<?php

namespace net\dontdrinkandroot\doctrineexample\dbal;


use Doctrine\DBAL\Connection;
use \PDO;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class DoctrineDbalTestCase extends \PHPUnit_Extensions_Database_TestCase
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

        $createArticleSql =
            "CREATE TABLE Article (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id));";
        $this->pdo->query($createArticleSql);
        $createTagSql =
            "CREATE TABLE Tag (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id));";
        $this->pdo->query($createTagSql);
        $createArticleTagSql=
            "CREATE TABLE Article_Tag (articles_id INTEGER NOT NULL, tags_id INTEGER NOT NULL, PRIMARY KEY(articles_id, tags_id));";
        $this->pdo->query($createArticleTagSql);
        $createArticleTagIndexSql = "CREATE INDEX IDX_2F475DCE1EBAF6CC ON Article_Tag (articles_id);";
        $this->pdo->query($createArticleTagIndexSql);
        $createArticleTagIndexSql = "CREATE INDEX IDX_2F475DCE8D7B4FB4 ON Article_Tag (tags_id);";
        $this->pdo->query($createArticleTagIndexSql);


        return $this->createDefaultDBConnection($this->pdo);
    }

    public function getDataSet()
    {
        $databasePath = __DIR__ . "/../../../../data.xml";

        return $this->createXMLDataSet(realpath($databasePath));
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }
}