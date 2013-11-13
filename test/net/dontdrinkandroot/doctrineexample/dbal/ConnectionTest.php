<?php


namespace net\dontdrinkandroot\dbal;


class ConnectionTest
{

    public function testConnection()
    {
        $config = new \Doctrine\DBAL\Configuration();
        $connectionParams = array(
            'memory' => true,
            'driver' => 'pdo_sqlite',
        );
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
    }

    public function testPdoConnection()
    {
        $config = new \Doctrine\DBAL\Configuration();
        $pdo = new \PDO('sqlite::memory:');
        $connectionParams = array(
            'pdo' => $this->pdo
        );
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
    }

} 