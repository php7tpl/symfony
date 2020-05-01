#cd ../../  &&

cd vendor &&
rm -rf php7lab &&
rm -rf rocket-php-lab &&
cd ../ &&
git clone https://github.com/php7lab/bundle.git vendor/php7lab_dev/bundle &&
git clone https://github.com/php7lab/core.git vendor/php7lab_dev/core &&
git clone https://github.com/php7lab/dev.git vendor/php7lab_dev/dev &&
git clone https://github.com/php7lab/eloquent.git vendor/php7lab_dev/eloquent &&
git clone https://github.com/php7lab/rest.git vendor/php7lab_dev/rest &&
git clone https://github.com/php7lab/sandbox.git vendor/php7lab_dev/sandbox &&
git clone https://github.com/php7lab/test.git vendor/php7lab_dev/test &&
git clone https://gitlab.com/rocket-php-lab/yii2-bridge-core.git vendor/rocket-php-lab_dev/yii2-bridge-core &&
git clone https://gitlab.com/rocket-php-lab/yii2-bridge-slug.git vendor/rocket-php-lab_dev/yii2-bridge-slug &&
git clone https://gitlab.com/rocket-php-lab/yii2-bundle.git vendor/rocket-php-lab_dev/yii2-bundle &&
git clone https://gitlab.com/rocket-php-lab/yii2-legacy.git vendor/rocket-php-lab_dev/yii2-legacy &&

cd vendor &&
mv rocket-php-lab_dev rocket-php-lab &&
mv php7lab_dev php7lab &&
cd ../

#git clone https://github.com/zndoc/rest-api.git vendor/zndoc_dev/rest-api &&