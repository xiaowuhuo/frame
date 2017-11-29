<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-27
 * Time: 上午11:25
 */

//定义根目录
define('ROOT_PATH', dirname(__FILE__));
//定义项目目录
define('APP_PATH', ROOT_PATH . '/app/');
//项目名称
define('APP','app\\');

//解析请求参数
require_once "vendor/autoload.php";

 \starter\start::run();

//$a = 'starter\Http\requestRealization';
//$b = new $a();
//$c = $b->input('foo');
//
//$responseRealization = new \starter\Http\responseRealization();
//$responseRealization->header('Content-Type', 'application/json')->header("Access-Control-Allow-Origin", "*")->json([1, 2, 3, 4]);
//var_dump($c);

//$a = new \starter\conf\confRealization();
//$b = $a->get('bootStrap')['dbParams'];
//var_dump($b);


//实例化类

//执行类方法

//返回方法结果

//返回客服端请求