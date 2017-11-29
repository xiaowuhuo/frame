<?php
namespace starter\common;
class Error{

    //存放错误配置
    private static $headr=null;

    //存放错误对象
    private static $whoops=null;

    /**
     * 抛出错误信息
     * @param string $message 错误信息
     * @param int $lever 错误等级
     * @throws Exception
     */
    public static function Thrown($message,$lever=E_NOTICE){
        $exception=new Exception($message,$lever,$lever);
        throw $exception;
    }


}