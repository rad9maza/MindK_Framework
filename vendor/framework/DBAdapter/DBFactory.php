<?php
/**
 * Created by PhpStorm.
 * User: rad9maza
 * Date: 04.09.16
 * Time: 11:18
 */

namespace Framework\DBAdapter;


class DBFactory
{

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