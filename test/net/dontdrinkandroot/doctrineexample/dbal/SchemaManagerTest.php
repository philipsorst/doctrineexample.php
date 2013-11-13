<?php


namespace net\dontdrinkandroot\doctrineexample\dbal;


use net\dontdrinkandroot\doctrineexample\dbal\DoctrineDbalTestCase;

class SchemaManagerTest extends DoctrineDbalTestCase
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