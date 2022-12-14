<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf16915d9ffd7db458835fc50ade5c5ca
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf16915d9ffd7db458835fc50ade5c5ca', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf16915d9ffd7db458835fc50ade5c5ca', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf16915d9ffd7db458835fc50ade5c5ca::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
