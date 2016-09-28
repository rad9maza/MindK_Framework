<?php

namespace Framework\Request;


class Request
{
    public function __construct()
    {
    }

    public function takePost($name)
    {
        return (array_key_exists($name, $_POST)) ? htmlspecialchars($_POST[$name]) : null;
    }

    public function takeGet($name)
    {
        return (array_key_exists($name, $_GET)) ? htmlspecialchars($_GET[$name]) : null;
    }

    /**
     * @return $_SERVER['REQUEST_URI']
     */
    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * @return $_SERVER['REQUEST_METHOD']
     */
    public function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}