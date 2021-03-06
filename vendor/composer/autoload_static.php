<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5891a82435504fb8e811fd3a3a4f41e0
{
    public static $prefixLengthsPsr4 = array(
        'F' =>
            array(
                'Framework\\' => 10,
            ),
        'A' =>
            array(
                'App\\' => 4,
            ),
    );

    public static $prefixDirsPsr4 = array(
        'Framework\\' =>
            array(
                0 => __DIR__ . '/..' . '/framework',
            ),
        'App\\' =>
            array(
                0 => __DIR__ . '/../..' . '/app',
            ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5891a82435504fb8e811fd3a3a4f41e0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5891a82435504fb8e811fd3a3a4f41e0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
