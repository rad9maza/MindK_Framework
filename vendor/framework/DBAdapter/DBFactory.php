<?php

namespace Framework\DBAdapter;


/**
 * Class DBFactory
 * Implement Factory for get connection to DB
 * @package Framework\DBAdapter
 */
class DBFactory
{

    /**
     * @param $driver
     * @param $config
     * @return mixed
     * @throws \Exception
     */
    public static function getConnection($driver, $config)
    {
        $driver = 'Framework\\DBAdapter\\' . $driver;
        if (class_exists($driver)) {
            return new $driver($config);
        } else {
            throw new \Exception("Неверный тип продукта");
        }
    }
}