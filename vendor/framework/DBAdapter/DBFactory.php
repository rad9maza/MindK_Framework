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
        switch ($driver) {
            case 'mysql':
                return new MySQL($config);
                break;
            case 'pgsql':
                return new PostgreSQL($config);
                break;
            default:
                throw new \Exception("Неверный тип продукта");
                break;
        }

    }
}