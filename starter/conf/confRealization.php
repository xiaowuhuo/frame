<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-27
 * Time: 下午10:04
 */
namespace starter\conf;

use starter\interfaceClass\conf\confInterface;
use starter\common\Error;
class confRealization implements confInterface
{
    static $conf;

    /**
     * 临时设置框架配置项
     * @param string $name 配置名称
     * @param array $value 配置值
     * @param string $file 配置文件
     * @return bool
     */
    public function set(string $name, array $value, string $file = ''): bool
    {
        $file = empty($file) ? APP_PATH . 'Config.php' : APP_PATH . $file;
        if (is_array($value)) {
            foreach ($value as $k => $v) {
                self::$conf[md5($file)][$name][$k] = $v;
            }
        } else {
            self::$conf[md5($file)][$name] = $value;
        }
        return true;
    }

    /**
     * 获取框架项目配置项
     * @param string $name 配置名称
     * @param string $file 配置文件
     * @param string $return 获取不到返回值
     * @return mixed
     * @throws \Exception
     */
    public function get(string $name, string $return = '', string $file = '')
    {
        $file=empty($file)?APP_PATH.'Config.php':APP_PATH.$file;
        if(isset(self::$conf[md5($file)][$name])){
            return self::$conf[md5($file)][$name];
        }
        if(file_exists($file)){

            $conf= require $file;
            if(!empty($conf[$name])){
                self::$conf[md5($file)][$name]=$conf[$name];
                return $conf[$name];
            }
            else{
                return $return!=''?$return:false;
            }
        }
        else{
            Error::Thrown('找不到配置文件');
        }
    }
}