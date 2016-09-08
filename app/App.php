<?php

namespace App;

use Framework\DBAdapter\DBFactory;

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
        $db = DBFactory::getConnection('MySQL', $this->config);
    }

    public function run()
    {

    }

    public function done()
    {

    }
}