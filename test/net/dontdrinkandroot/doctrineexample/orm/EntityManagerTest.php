<?php


namespace net\dontdrinkandroot\doctrineexample\orm;


class EntityManagerTest extends DoctrineOrmTestCase
{

    public function testFind()
    {
        $article = $this->entityManager->find('net\dontdrinkandroot\doctrineexample\entity\Article', 2);
        $this->assertEquals("Article Two", $article->getName());
    }

}