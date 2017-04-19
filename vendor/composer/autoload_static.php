<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d100b5ea0ebf1807c50bfe7d20ebda7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'ProcessMaker\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ProcessMaker\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/ProcessMaker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d100b5ea0ebf1807c50bfe7d20ebda7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d100b5ea0ebf1807c50bfe7d20ebda7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
