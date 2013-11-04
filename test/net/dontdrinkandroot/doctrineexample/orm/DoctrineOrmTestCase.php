<?php


namespace net\dontdrinkandroot\doctrineexample\orm;


use Doctrine\ORM\Tools\Setup;
use net\dontdrinkandroot\doctrineexample\DoctrineTestCase;

class DoctrineOrmTestCase extends DoctrineTestCase
{

    protected function getConfiguration()
    {
        $config = Setup::createYAMLMetadataConfiguration(array(__DIR__ . "../../../../config/yaml", true));
        return $config;
    }

}