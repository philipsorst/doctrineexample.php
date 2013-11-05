<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$loader = require __DIR__ . '/lib/autoload.php';

/* Create a simple "default" Doctrine ORM configuration for Annotations */
$isDevMode = true;
$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

/* database configuration parameters */
$conn = array(
    'driver' => 'pdo_sqlite',
    'memory' => true
);

/* obtaining the entity manager */
$entityManager = EntityManager::create($conn, $config);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);