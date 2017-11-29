<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-28
 * Time: 下午4:22
 */
namespace starter;
use starter\loader\startUpRealization;
class start
{
    public static function run()
    {
        startUpRealization::init();
        $a = startUpRealization::loadResult();
    }
}
