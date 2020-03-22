<?php

namespace App\Bootstrap;

use PhpLab\Core\Helpers\ComposerHelper;

class Autoload
{

    public static function bootstrapApplication(string $rootDir)
    {
        $pharFileName = 'phar://' . $rootDir . '/src/app.phar';
        if(file_exists($pharFileName)) {
            ComposerHelper::register('App', $pharFileName);
        } else {
            ComposerHelper::register('App', $rootDir . '/src');
        }
    }

    public static function bootstrapVendor(string $rootDir)
    {
        //$rootDir = realpath($rootDir);
        $vendorDir = $rootDir . '/vendor';
        $isIncluded = self::includeVendorAutoload($vendorDir);
        if ( ! $isIncluded) {
            $isDownloaded = self::downloadVendor($vendorDir);
            if ($isDownloaded) {
                self::includeVendorAutoload($vendorDir);
            } else {
                exit('Vendor not loaded!');
            }
        }
    }

    private static function downloadVendor(string $vendorDir): bool
    {
        require_once __DIR__ . '/../Bootstrap/VendorDownloader.php';
        $isDownloaded = VendorDownloader::downloadPhar($vendorDir);
        return $isDownloaded;
    }

    private static function includeVendorAutoload(string $vendorDir): bool
    {
        if (self::load($vendorDir . '/autoload.php')) {
            return true;
        }
        $pharPath = 'phar://' . $vendorDir;
        if (self::load($pharPath . '/vendor.phar/autoload.php')) {
            return true;
        }
        if (self::load($pharPath . '/vendor.phar.gz/autoload.php')) {
            return true;
        }
        return false;
    }

    private static function load($fileName): bool
    {
        if (file_exists($fileName)) {
            require_once($fileName);
            return true;
        }
        return false;
    }

}
