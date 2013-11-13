<?php


namespace net\dontdrinkandroot\doctrineexample\orm;


use net\dontdrinkandroot\doctrineexample\entity\Article;
use net\dontdrinkandroot\doctrineexample\entity\Tag;

class ManyToManyTest extends DoctrineOrmTestCase
{

    public function testAddTag()
    {
        /**
         * @var Article
         */
        $article = $this->getArticleRepository()->find(3);

        /**
         * @var Tag
         */
        $tag = $this->getTagRepository()->find(1);

        $article->getTags()->add($tag);

        $this->entityManager->flush();
    }

} 