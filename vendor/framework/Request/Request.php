<?php

namespace Framework\Request;


/**
 * Class Request
 * Singleton implementation request
 * @package Framework\Request
 */
class Request
{
    /**
     * @var null stores instance of Request
     */
    private static $_instance = null;

    private function __construct()
    {
    }

    private function clone()
    {
    }

    /**
     * @return Request instance
     */
    public static function create()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @param $name
     * Method return $_Post[$name]
     * @return null|string
     */
    public function takePost($name)
    {
        return (array_key_exists($name, $_POST)) ? htmlspecialchars($_POST[$name]) : null;
    }

    /**
     * @param $name
     * Method return $_Get[$name]
     * @return null|string
     */
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

    public function take($param) {
        //TODO taking any params from _SERVER
    }
}