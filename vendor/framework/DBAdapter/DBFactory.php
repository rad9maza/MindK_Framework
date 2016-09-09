<?php

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