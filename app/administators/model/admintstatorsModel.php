<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-28
 * Time: 下午5:17
 */
namespace app\administators\model;

use app\administators\entity\administatorsEntity;
use Doctrine\ORM\EntityManager;
use starter\interfaceClass\appInterface\model\modelInterface;
use starter\loader\startUpRealization;

class admintstatorsModel implements modelInterface
{
    public $administators;
    /**
     * @var EntityManager
     */
    public $entityManager;

    public function __construct()
    {
        $this->administators = new administatorsEntity();
        $this->getEntityManager();
    }

    public function getEntityManager()
    {
        $this->entityManager = startUpRealization::loadBootStrap()->getEntityManager();
    }

    public function setName()
    {
        $this->administators->setName('qweqwe');
        $this->entityManager->persist($this->administators);
        $this->entityManager->flush();
    }














}
