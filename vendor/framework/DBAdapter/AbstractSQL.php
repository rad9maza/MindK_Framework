<?php

namespace Framework\DBAdapter;


abstract class AbstractSQL
{
    public function __construct($config = [])
    {
//        echo var_dump($config['db']['MySQL']);
    }

    public function query($statement)
    {

    }

    public function insert($statement)
    {

    }

    public function delete($statement)
    {

    }

    public function escape_symbols($statement)
    {

    }
}