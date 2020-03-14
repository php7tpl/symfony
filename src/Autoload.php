<?php

namespace App;

class Autoload
{

    public static function register(string $namespace, string $path): void
    {
        $path = realpath($path);
        $function = function ($className) use ($namespace, $path) {
            if (strpos($className, $namespace . '\\') !== 0 || $className == $namespace) {
                return;
            }
            if (strpos($path, '.php') === false) {
                $classFile = str_replace($namespace, $path, $className);
                $fileName = $classFile . '.php';
            } else {
                $classFile = str_replace($namespace, $path, $className);
                $fileName = $classFile;
            }
            if ( ! file_exists($fileName)) {
                //exit($fileName);
                exit('Class "' . $className . '" not found!');
                //throw new FileNotFoundException('Class "' . $className . '" not found!');
            }
            include_once $fileName;
        };
        spl_autoload_register($function);
    }

    public static function init()
    {
        if ( ! self::load('autoload.php')) {
            self::load('vendor.phar') || self::load('vendor.phar.gz');
            self::register('App', __DIR__ . '/../src');
        }
    }

    private static function load($name): bool
    {
        $vendorDir = realpath(__DIR__ . '/../vendor');
        if (file_exists($vendorDir . '/' . $name)) {
            require $vendorDir . '/' . $name;
            return true;
        }
        return false;
    }

}
