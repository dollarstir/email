<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb2042bdf94da2fd1eed15dee6f7be42e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Predis\\' => 7,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb2042bdf94da2fd1eed15dee6f7be42e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb2042bdf94da2fd1eed15dee6f7be42e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb2042bdf94da2fd1eed15dee6f7be42e::$classMap;

        }, null, ClassLoader::class);
    }
}