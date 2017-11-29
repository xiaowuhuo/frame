<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-28
 * Time: 上午9:28
 */
namespace starter\bootStrap;

use starter\interfaceClass\bootStrap\bootStrapInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class bootStrapRealization implements bootStrapInterface
{

    public $paths;
    public $dbParams;
    public $isDevMode;

    /**
     * @param string $paths
     * @return bootStrapInterface
     */
    public function addPaths(string $paths): bootStrapInterface
    {
        $this->paths[] = APP_PATH . $paths;
        return $this;
    }

    /**
     * @param array $dbParams
     */
    public function setDbParams(array $dbParams) : void
    {
        $this->dbParams = $dbParams;
    }

    /**
     * @param bool $isDevMode
     */
    public function isDevMode(bool $isDevMode = false) : void
    {
        $this->isDevMode = $isDevMode;
    }

    public function getEntityManager() :EntityManager
    {
        $paths = $this->paths;
        $isDevMode = $this->isDevMode;

        $dbParams = $this->dbParams;

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);
        return $entityManager;
    }














}