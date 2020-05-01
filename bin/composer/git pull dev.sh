#!/bin/sh
cd ../../vendor

git clone "git@github.com:php7lab/core.git" "php7lab-dev/core"
git clone "git@github.com:php7lab/eloquent.git" "php7lab-dev/eloquent"
git clone "git@github.com:php7lab/bundle.git" "php7lab-dev/bundle"
git clone "git@github.com:php7lab/dev.git" "php7lab-dev/dev"
git clone "git@github.com:php7lab/rest.git" "php7lab-dev/rest"
git clone "git@github.com:php7lab/sandbox.git" "php7lab-dev/sandbox"
git clone "git@github.com:php7lab/test.git" "php7lab-dev/test"
git clone "git@github.com:php7lab/web.git" "php7lab-dev/web"

git clone "git@github.com:php7bundle/article.git" "php7bundle-dev/article"
git clone "git@github.com:php7bundle/crypt.git" "php7bundle-dev/crypt"
git clone "git@github.com:php7bundle/notify.git" "php7bundle-dev/notify"
git clone "git@github.com:php7bundle/queue.git" "php7bundle-dev/queue"
git clone "git@github.com:php7bundle/reference.git" "php7bundle-dev/reference"
git clone "git@github.com:php7bundle/storage.git" "php7bundle-dev/storage"
git clone "git@github.com:php7bundle/user.git" "php7bundle-dev/user"