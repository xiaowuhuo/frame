<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use starter\bootStrap\bootStrapRealization;
require_once "vendor/autoload.php";
//定义根目录
define('ROOT_PATH', dirname(__FILE__));
//定义项目目录
define('APP_PATH', ROOT_PATH . '/app/');
//项目名称
define('APP','app\\');

$conf = new \starter\conf\confRealization();

$bootStrap = new bootStrapRealization();
$bootStrap->setDbParams($conf->get('bootStrap')['dbParams']);
$bootStrap->addPaths('administators/entity');
$entityManager = $bootStrap->getEntityManager();
return ConsoleRunner::createHelperSet($entityManager);