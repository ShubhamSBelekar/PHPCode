<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitadf2c5f828af0e6464fb0a36daf1b885
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitadf2c5f828af0e6464fb0a36daf1b885::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitadf2c5f828af0e6464fb0a36daf1b885::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitadf2c5f828af0e6464fb0a36daf1b885::$classMap;

        }, null, ClassLoader::class);
    }
}
