<?php
namespace starter\interfaceClass\conf;
interface confInterface{
    /**
     * 临时设置框架配置项
     * @param string $name 配置名称
     * @param array $value 配置值
     * @param string $file 配置文件
     * @return bool
     */
    public function set(string $name, array $value, string $file = ''): bool;

    /**
     * 获取框架项目配置项
     * @param string $name 配置名称
     * @param string $file 配置文件
     * @param string $return 获取不到返回值
     * @return mixed
     * @throws \Exception
     */
    public function get(string $name, string $return = '', string $file = '');

}