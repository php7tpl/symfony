#!/bin/sh
cd ../../vendor

cd php7lab/eloquent && git push
cd ../../php7lab/bundle && git push
cd ../../php7lab/dev && git push
cd ../../php7lab/rest && git push
cd ../../php7lab/sandbox && git push
cd ../../php7lab/test && git push
cd ../../php7lab/web && git push

cd ../../php7bundle/article && git push
cd ../../php7bundle/crypt && git push
cd ../../php7bundle/notify && git push
cd ../../php7bundle/queue && git push
cd ../../php7bundle/reference && git push
cd ../../php7bundle/storage && git push
cd ../../php7bundle/user && git push
