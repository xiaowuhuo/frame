<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-28
 * Time: 上午8:50
 */
namespace starter\interfaceClass\bootStrap;

use Doctrine\ORM\EntityManager;

interface bootStrapInterface
{
    /**
     * @param string $paths
     * @return bootStrapInterface
     */
    public function addPaths(string $paths): bootStrapInterface;

    /**
     * @param array $dbParams
     */
    public function setDbParams(array $dbParams) : void;

    /**
     * @param bool $isDevMode
     */
    public function isDevMode(bool $isDevMode) : void;

    public function getEntityManager() : EntityManager;
























}