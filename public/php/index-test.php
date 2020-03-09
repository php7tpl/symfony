<?php

if(isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = str_replace('/index-test.php', '', $_SERVER['REQUEST_URI']);
}
$_ENV['APP_ENV'] = 'test';
require 'index.php';
