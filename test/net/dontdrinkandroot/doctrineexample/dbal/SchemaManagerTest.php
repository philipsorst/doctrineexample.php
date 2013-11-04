<?php


namespace net\dontdrinkandroot\dbal;


use net\dontdrinkandroot\doctrineexample\DoctrineTestCase;

class SchemaManagerTest extends DoctrineTestCase
{

    public function testListDatabases()
    {
        $this->markTestSkipped("Not supported in sqlite");

        $schemaManager = $this->connection->getSchemaManager();
        $databases = $schemaManager->listDatabases();
    }

    public function testListTableColumns()
    {
        $schemaManager = $this->connection->getSchemaManager();
        $columns = $schemaManager->listTableColumns('Article');

        $this->assertArrayHasKey('id', $columns);
        $this->assertArrayHasKey('price', $columns);
        $this->assertArrayHasKey('name', $columns);
    }

}