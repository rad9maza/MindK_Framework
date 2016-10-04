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
    public $config;

    /**
     * App constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
        $this->db = DBFactory::getConnection('MySQL', $this->config['db']);
        $this->request = Request::create();
    }

    public function run()
    {
        try {
            $router = new Router($this->config["routes"]);
            $route = $router->getRoute($this->request);

            $className = 'App\\Controller\\' . $route['class'] . 'Controller';
            $method = $route['method'];

            $class = new $className();

            $rClass = new ReflectionClass($class);
            $rMethod = $rClass->getMethod($method);
            $rParam = $rMethod->getParameters();


            foreach ($rParam as $p) {
                if ($p->getClass() != null) {
                    if ($p->getClass()->getName() == 'Framework\Request\Request') {
                        $route['params'][0]['request'] = $this->request;
                        break;
                    }
                }
            }

            if (empty($rParam)) {
                $response = call_user_func([$class, $method]);
            } else {
                $response = call_user_func_array([$class, $method], $route['params'][0]);
            }

            if (!$response instanceof Response) {
                $response = new Response('Bad Response Type Error', 500);
            }


        } catch (NotFoundException $e) {
            $response = new ErrorResponse($e->getMessage(), 404);
        }

        $response->send();

    }

    public function done()
    {

    }
}