<?php


namespace App;



if(! defined("DS")){
    define("DS" , DIRECTORY_SEPARATOR);
}

require_once "..". DS . "App" . DS . "config.php";

require_once APP_PATH . DS . "vendor". DS . "autoload.php"; 

use App\vendor\frontcontroller;





 $controller =  new frontcontroller();

$controller->dipatch();