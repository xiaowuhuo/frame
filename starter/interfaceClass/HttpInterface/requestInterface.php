<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-27
 * Time: 下午5:50
 */
namespace starter\interfaceClass\HttpInterface;
use Symfony\Component\HttpFoundation\Request;
interface requestInterface
{
    /**
     * @return Request
     */
    public static function request(): Request;

    /**
     * @param string|null $key
     * @param string|null|array $default
     * @return array
     */
    public function input(string $key = null,$default = null);

    /**
     * @return string
     */
    public function getInputSource();

    /**
     * @param string $name
     * @return true
     */
    public function has(string $name) : bool;


























}