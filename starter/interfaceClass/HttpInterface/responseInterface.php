<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-27
 * Time: 下午5:51
 */
namespace starter\interfaceClass\HttpInterface;

use Symfony\Component\HttpFoundation\Response;

interface responseInterface
{
    /**
     * @return Response
     */
    public static function response(): response;

    /**
     * @param string $key
     * @param string $value
     * @return responseInterface
     */
    public function header(string $key, string $value): responseInterface;

    /**
     * @param array $value
     */
    public function json(array $value): void;

    /**
     * @param array $value
     */
    public function jsonp(array $value, string $callback): void;


}