<?php

namespace App;

use Framework\DBAdapter\DBFactory;
use Framework\Exception\NotFoundException;
use Framework\Request\Request;
use Framework\Response\ErrorResponse;
use Framework\Router\Router;
use Framework\Response\Response;
use ReflectionClass;


/**
 * Class App
 * @package App
 */
class App
{
    /**
     * @var array contains Config of Application
     */
    public $config;


    /**
     * @var string define sql driver name
     */
    public static $DRIVER = 'MySQL';

    /**
     * App constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
        $this->db = DBFactory::getConnection(static::$driver, $this->config['db']);
        $this->request = Request::create();
    }

    public function run()
    {
        try {
            //get route
            $router = new Router($this->config["routes"]);
            $route = $router->getRoute($this->request);

            //generate controller className and methodName
            $className = 'App\\Controller\\' . $route['class'] . 'Controller';
            $method = $route['method'];


            $class = new $className();

            //detects necessity Request for action
            //TODO Порядок ключей в ассоциативном массиве не определен. Твой request может оказаться как в начале, так и в конце. Варианты:
            //TODO 1) Написать, чтобы не зависимо от порядка, переменные инжектились в контроллер строго по имени (сложнее, но динамичней).
            //TODO 2) Передавать как обычный массив (получить через array_keys), где мы можем четко регулировать порядок.
            $rClass = new ReflectionClass($class);
            $rMethod = $rClass->getMethod($method);
            $rParam = $rMethod->getParameters();

            foreach ($rParam as $p) {
                if ($p->getClass() != null && $p->getClass()->getName() == 'Framework\Request\Request') {
                    $route['params']['request'] = $this->request;
                    break;
                }
            }

            //depending on the availability of parameters choose call method
            if (empty($rParam)) {
                $response = call_user_func([$class, $method]);
            } else {
                $response = call_user_func_array([$class, $method], $route['params']);
            }

            if (!$response instanceof Response) {
                $response = new ErrorResponse('Bad Response Type Error', 500);
            }


        } catch (NotFoundException $e) {
            $response = new ErrorResponse($e, 404);
        }

        $response->send();

    }

    public function done()
    {

    }
}