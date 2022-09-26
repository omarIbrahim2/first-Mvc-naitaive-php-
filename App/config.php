<?php

namespace App;

if(! defined("DS")){
    define("DS" , DIRECTORY_SEPARATOR);
}

$path = str_replace('\\' , '/' , realpath(dirname(__FILE__)));

define("APP_PATH" , $path);


define("VIEW_PATH" , APP_PATH.'/'."views");

define("DATABASE" , "mysql");
define("DB_NAME" , "mytest");

define("DB_USERNAME" , "root");

define("DB_PASSWORD" , "");

define("DB_HOST" , "localhost");




