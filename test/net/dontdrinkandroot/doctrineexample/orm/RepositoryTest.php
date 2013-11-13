<?php


namespace net\dontdrinkandroot\doctrineexample\orm;


class RepositoryTest extends DoctrineOrmTestCase
{

    public function testFind()
    {
        $articleRepository = $this->getArticleRepository();
        $article = $articleRepository->find(1);

        $this->assertEquals(1, $article->getId());
    }

    public function testFindBy()
    {
        $articleRepository = $this->getArticleRepository();
        $articles = $articleRepository->findBy(array("price" => 4.75));

        $this->assertCount(1, $articles);
        $this->assertEquals(2, $articles[0]->getId());
    }

    public function testFindOneBy()
    {
        $articleRepository = $this->getArticleRepository();
        $article = $articleRepository->findOneBy(array("price" => 4.75));

        $this->assertEquals(2, $article->getId());
    }

    public function testFindAll()
    {
        $articleRepository = $this->getArticleRepository();
        $articles = $articleRepository->findAll();

        $this->assertCount(3, $articles);
    }

    protected function getArticleRepository()
    {
        return $this->entityManager->getRepository('net\dontdrinkandroot\doctrineexample\entity\Article');
    }

}