<?php

namespace App\Bootstrap;

class VendorDownloader
{

    public static function downloadPhar(string $vendorDir): bool {

        echo PHP_EOL . PHP_EOL . 'Download vendor... ';
        $gzContent = self::getContent();
        if($gzContent) {
            self::makeDir($vendorDir);
            file_put_contents($vendorDir . '/vendor.phar.gz', $gzContent);
            return true;
        }
        echo 'OK' . PHP_EOL;
        return false;
    }

    private static function makeDir($dir) {
        $fullName = $dir;
        if( ! is_dir($fullName)) {
            mkdir($fullName);
        }
    }

    private static function getContent() {
        $pharConfig = include(__DIR__ . '/../../config/phar.php');
        $url = str_replace('{version}', $pharConfig['vendor']['version'], $pharConfig['vendor']['downloadUrl']);
        $gzContent = file_get_contents($url);
        return $gzContent;
    }
}
