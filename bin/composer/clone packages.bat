@echo off

cd ../..

git clone https://github.com/php7lab/bundle.git vendor/php7lab_dev/bundle
git clone https://github.com/php7lab/core.git vendor/php7lab_dev/core
git clone https://github.com/php7lab/dev.git vendor/php7lab_dev/dev
git clone https://github.com/php7lab/eloquent.git vendor/php7lab_dev/eloquent
git clone https://github.com/php7lab/rest.git vendor/php7lab_dev/rest
git clone https://github.com/php7lab/sandbox.git vendor/php7lab_dev/sandbox
git clone https://github.com/php7lab/test.git vendor/php7lab_dev/test

git clone https://github.com/zndoc/rest-api.git vendor/zndoc_dev/rest-api

pause