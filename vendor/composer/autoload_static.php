<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit35c68894fbfb3db15aa92b76ef877304
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CodinPro\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CodinPro\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit35c68894fbfb3db15aa92b76ef877304::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit35c68894fbfb3db15aa92b76ef877304::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
