<?php


namespace net\dontdrinkandroot\dbal;


use net\dontdrinkandroot\doctrineexample\dbal\DoctrineDbalTestCase;
use \PDO;

class BasicTest extends DoctrineDbalTestCase
{

    public function testExecuteQuery()
    {
        $sql = "SELECT * FROM Article WHERE price > :price";
        $params = array(':price' => 4);

        $statement = $this->connection->executeQuery($sql, $params);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $this->assertCount(1, $result);
        $row = $result[0];
        $this->assertEquals(2, $row['id']);
    }

}