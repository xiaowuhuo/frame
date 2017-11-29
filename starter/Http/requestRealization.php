<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-27
 * Time: 下午7:26
 */
namespace starter\Http;

use starter\interfaceClass\HttpInterface\requestInterface;
use Symfony\Component\HttpFoundation\Request;

class requestRealization implements requestInterface
{
    static $request;

    /**
     * @return Request
     */
    public static function request(): Request
    {
        if (is_null(self::$request) || isset (self::$request)) {
            self::$request = new Request(
                $_GET,
                $_POST,
                array(),
                $_COOKIE,
                $_FILES,
                $_SERVER);
        }
        return self::$request;
    }

    /**
     * @param string|null $key
     * @param string|null|array $default
     * @return array
     */
    public function input(string $key = null, $default = null)
    {
        $input = $this->getInputSource();
        if ($key) {
            return $input->get($key, $default);
        } else {
            return $input->all();
        }
    }

    /**
     * @return string
     */
    public function getInputSource()
    {
        return $this->request()->getRealMethod() == 'GET' ? $this->request()->query : $this->request()->request;
    }

    /**
     * @param string $key
     * @return true
     */
    public function has(string $key): bool
    {
        $input = $this->getInputSource();
        return $input->has($key);
    }
}