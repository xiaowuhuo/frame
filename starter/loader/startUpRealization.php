<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-28
 * Time: 上午9:51
 */
namespace starter\loader;

use starter\bootStrap\bootStrapRealization;
use starter\common\Error;
use starter\conf\confRealization;
use starter\Http\requestRealization;
use starter\Http\responseRealization;
use starter\interfaceClass\bootStrap\bootStrapInterface;
use starter\interfaceClass\loader\startUpInterface;
use starter\interfaceClass\HttpInterface\requestInterface;
use starter\interfaceClass\HttpInterface\responseInterface;
use starter\interfaceClass\conf\confInterface;

class startUpRealization implements startUpInterface
{
    /**
     * @var requestRealization
     */
    static $request;
    /**
     * @var responseRealization
     */
    static $response;
    /**
     * @var confRealization
     */
    static $conf;
    /**
     * @var bootStrapRealization
     */
    static $bootStrap;


    /**
     * @return requestInterface
     */
    public static function initRequest(): requestInterface
    {
        if (is_null(self::$request) || isset (self::$request)) {
            self::$request = new requestRealization();
        }
        return self::$request;
    }

    /**
     * @return responseInterface
     */
    public static function initResponse(): responseInterface
    {
        if (is_null(self::$response) || isset (self::$response)) {
            self::$response = new responseRealization();
        }
        return self::$response;
    }

    /**
     * @return confInterface
     */
    public static function initConf(): confInterface
    {
        if (is_null(self::$conf) || isset (self::$conf)) {
            self::$conf = new confRealization();
        }
        return self::$conf;
    }

    /**
     * @return mixed
     */
    public static function getClassName()
    {
        $m = self::$request->input('m');
        $c = self::$request->input('c');

        $class = $m.'\\controller\\'.$c.'Controller';
        return $class;
    }

    /**
     * @return mixed
     */
    public static function getFuncName()
    {
        $a = self::$request->input('a');
        return $a;
    }

    /**
     * @return mixed
     */
    public static function loadClass()
    {
        $class= self::getClassName();
        $new_class= APP_PATH . str_replace('\\','/',$class) . '.php';
        $class = APP . $class;
        if(!file_exists($new_class)){
            Error::Thrown('找不到控制器'.$class);
        }
        return $class;
    }

    /**
     * @return mixed
     */
    public static function loadResult()
    {
        $class = self::loadClass();
        $a = self::getFuncName();
        $controller = new $class();
        $action=get_class_methods($class);
        if(!in_array($a,$action)){
            Error::Thrown('找不到方法'.$a);
        }
        return $controller->$a(self::$request);
    }

    /**
     * @return mixed
     */
    public static function loadBootStrap() : bootStrapInterface
    {
        if (is_null(self::$bootStrap) || isset (self::$bootStrap)) {
            self::$bootStrap = new bootStrapRealization();
        }

        $dbParams = self::$conf->get('bootStrap')['dbParams'];
        self::$bootStrap->setDbParams($dbParams);
        $m = self::$request->input('m');
        $c = self::$request->input('c');
        $paths = '/'.$m.'/entity/'.$c.'Entity';
        self::$bootStrap->addPaths($paths);
        return self::$bootStrap;
    }


    public static function init()
    {
        self::initRequest();
        self::initConf();
        self::initResponse();

    }   
}