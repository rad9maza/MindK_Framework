<?php

namespace App;

use Framework\DBAdapter\DBFactory;
use Framework\Request\Request;
use Framework\Router\Router;
use Framework\Response\Response;


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
        $this->request = new Request();
    }

    public function run()
    {
        $router = new Router($this->config["routes"]);
        $route = $router->getRoute($this->request);
        var_dump($route);
        if (!$route) {
            $response = new Response('Not Found', 404);
        } else {
            $response = call_user_func_array('App\\Controller\\' . $route['class'] . '::' . $route['method'], $route['params']);
        }

        if (!$response instanceof Response) {
            $response = new Response('Bad Response Type Error', 500);
        }
        $response->send();
    }

    public function done()
    {

    }
}