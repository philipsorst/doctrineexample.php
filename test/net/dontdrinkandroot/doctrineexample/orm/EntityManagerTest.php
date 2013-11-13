<?php


namespace net\dontdrinkandroot\doctrineexample\orm;


use net\dontdrinkandroot\doctrineexample\entity\Article;

class EntityManagerTest extends DoctrineOrmTestCase
{

    public function testFind()
    {
        $article = $this->entityManager->find('net\dontdrinkandroot\doctrineexample\entity\Article', 2);
        $this->assertEquals("Article Two", $article->getName());
    }

    public function testPersist()
    {
        $article = new Article();
        $article->setName("New Article");
        $article->setPrice(6.66);

        $this->entityManager->persist($article);
        $this->entityManager->flush();

        $article = $this->entityManager->find('net\dontdrinkandroot\doctrineexample\entity\Article', 4);
        $this->assertEquals("New Article", $article->getName());
    }

}