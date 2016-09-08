<?php
/**
 * Created by PhpStorm.
 * User: robo0914
 * Date: 08.09.2016
 * Time: 17:08
 */

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