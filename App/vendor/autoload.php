<?php
namespace App\vendor;
 
 

class autoload{

    

    public static function Autoload($classname){
          $classname= str_replace("\\" , '/' , $classname);
          $classname = APP_PATH . $classname;  
          $classname = str_replace("AppApp" , "App" , $classname);
            $classname .= ".php";
          if (file_exists($classname)) {
              require_once $classname;
          }

          return;

        
    }


    
}


 
spl_autoload_register(__NAMESPACE__ . DS . "autoload::Autoload");