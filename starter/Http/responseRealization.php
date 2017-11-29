<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-27
 * Time: 下午8:33
 */
namespace starter\Http;

use starter\interfaceClass\HttpInterface\responseInterface;
use Symfony\Component\HttpFoundation\Response;
class responseRealization implements responseInterface
{
    /**
     * @var response
     */
    public static $response;

    public function __construct()
    {
        responseRealization::response();
    }

    /**
     * @return Response
     */
    public static function response() : response
    {
        if (is_null(self::$response) || isset (self::$response)) {
        self::$response = new response();
    }
        return self::$response;
    }

    /**
     * @param string $key
     * @param string $value
     * @return responseInterface
     */
    public function header(string $key,string $value) : responseInterface
    {
        self::$response->headers->set($key,$value);
        return $this;
    }

    /**
     * @param array $value
     */
    public function json(array $value) : void
    {
        self::$response->setContent(json_encode($value));
        $this->header('Content-Type', 'application/json');
        $this->send();
    }

    /**
     * @param array $value
     * @param string $callback
     */
    public function jsonp(array $value,string $callback) : void
    {
        self::$response->setContent('var data = '.json_encode($value).';');
        self::$response->setContent($callback.'(data);');
        $this->header('Content-Type', 'text/javascript');
        $this->send();
    }
    private function send() : void
    {
        self::$response->prepare(requestRealization::request());
        self::$response->send();
    }
















}