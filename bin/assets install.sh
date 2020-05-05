#!/bin/sh
cd ..
rm -rf "public/bundles"
mkdir "public/bundles"
mkdir "public/bundles/web"
cp -r "vendor/php7lab/web/src/Resources/Public/vendor" "public/bundles/web"
chmod a+rw -R "public/bundles/web"