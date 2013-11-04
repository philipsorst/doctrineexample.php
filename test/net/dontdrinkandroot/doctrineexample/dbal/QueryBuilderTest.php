<?php


namespace net\dontdrinkandroot\dbal;

use \PDO;
use net\dontdrinkandroot\doctrineexample\DoctrineTestCase;

class QueryBuilderTest extends DoctrineTestCase
{

    public function testSelect()
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $query = $queryBuilder->select("id")->from("Article", "article")->where($queryBuilder->expr()->gt('price', 4));
        $statement = $query->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $this->assertCount(1, $result);
        $row = $result[0];
        $this->assertEquals(2, $row['id']);
    }

}