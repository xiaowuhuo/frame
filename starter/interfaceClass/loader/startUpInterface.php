<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-27
 * Time: 下午10:23
 */
namespace starter\interfaceClass\loader;

use starter\interfaceClass\bootStrap\bootStrapInterface;
use starter\interfaceClass\conf\confInterface;
use starter\interfaceClass\HttpInterface\requestInterface;
use starter\interfaceClass\HttpInterface\responseInterface;

interface startUpInterface
{
    /**
     * @return requestInterface
     */
    public static function initRequest(): requestInterface;

    /**
     * @return responseInterface
     */
    public static function initResponse(): responseInterface;

    /**
     * @return confInterface
     */
    public static function initConf(): confInterface;

    /**
     * @return mixed
     */
    public static function getClassName();

    /**
     * @return mixed
     */
    public static function getFuncName();

    /**
     * @return mixed
     */
    public static function loadClass();

    /**
     * @return mixed
     */
    public static function loadResult();

    /**
     * @return mixed
     */
    public static function loadBootStrap() : bootStrapInterface;

}