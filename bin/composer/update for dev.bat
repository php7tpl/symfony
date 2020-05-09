@echo off

cd ../..

cd vendor/yii2tool/yii2-vendor/bin
php bin config/to-dev
cd ../../../..

composer update

cd vendor/yii2tool/yii2-vendor/bin
php bin config/update

pause