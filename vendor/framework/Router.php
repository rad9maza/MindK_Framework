<?php

namespace Framework;

class Router
{
    private $config;

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    public function get_route()
    {
        $uri = $this->get_uri();
        $request_method = $this->get_request_method();


        foreach ($this->config as $route_name => $route_array) {
            if ($route_array['http_method'] === $request_method) {
                if (array_key_exists('requirements', $route_array)) {
                    $this->prepare_pattern($route_array['pattern'], $route_array['requirements']);
                    return [$route_name => $route_array];
                } elseif ($route_array['requirements'] === $uri) {
                    return [$route_name => $route_array];
                }
            }
        }
    }

    public function prepare_pattern($pattern, $requirements)
    {
        echo var_dump($pattern);
        echo var_dump($requirements);

    }

    public
    function get_uri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public
    function get_request_method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}