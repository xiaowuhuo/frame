<?php
// bootstrap.php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
//use Entities;

$paths = array(__DIR__ . "/administators/entity", __DIR__ . "/basic/entity");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'mysqli',
    'user'     => 'root',
    'password' => '123qweasd',
    'dbname'   => 'shechem',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
//$class = $entityManager->getMetadataFactory()->getMetadataFor('Entities\User');
//var_dump($class);
//$driver = new PHPDriver(__DIR__ . '/mapping');
//$entityManager->getConfiguration()->setMetadataDriverImpl($driver);
$class = $entityManager->getClassMetadata('Entities\User');
//$class->table;
//$entityManager->flush();
//var_dump($class->table);
//$class = $entityManager->getClassMetadata('Entities\User');

//$product = new Entities\User();
//$product->set_username('wang');
//$product->set_id(0);
//$product->set_login_count(2);
//
//$entityManager->persist($product);
//$entityManager->flush();