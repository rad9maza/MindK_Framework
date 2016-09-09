<?php

namespace App;

use Framework\DBAdapter\DBFactory;
use Framework\Router;

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
        $this->router = new Router($this->config["routes"]);

    }

    public function run()
    {
        echo var_dump($this->router->get_route());
    }

    public function done()
    {

    }
}