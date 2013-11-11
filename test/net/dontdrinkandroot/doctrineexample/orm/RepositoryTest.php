<?php


namespace net\dontdrinkandroot\doctrineexample\orm;


class RepositoryTest extends DoctrineOrmTestCase
{

    public function testFind()
    {
        $articleRepository = $this->getArticleRepository();
        $article = $articleRepository->find(1);

        print_r($article);
    }

    protected function getArticleRepository()
    {
        return $this->entityManager->getRepository('net\dontdrinkandroot\doctrineexample\entity\Article');
    }

}