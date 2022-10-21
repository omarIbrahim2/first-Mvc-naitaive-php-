<?php
namespace App\vendor;



class frontcontroller{
      private $controller = "index";

      private $action = "default";

      public $params = array();

      
     public function __construct()
     {
        
        $this->parse();
     }

      private function parse(){
          $urlStr = $_SERVER["REQUEST_URI"];
          $urlStr = trim($urlStr , '/');
          $url = explode('/' ,$urlStr);
          
         

          if (isset($url[0]) && $url[0] != '' ) {
             $this->controller = $url[0];
             
          }
         
          if (isset($url[1]) && $url[1] != '' ) {
            $this->action = $url[1];
         }

         if (isset($url[2]) && $url[2] != '' ) {
            $this->params = explode( '/',$url[2]);
         }
      }

       public function dipatch(){
          
         $controllerClassName = "\App\controllers\\". ucfirst($this->controller) . "Controller";
            
         if (class_exists($controllerClassName)) {
               $controllerObj = new $controllerClassName();
               
         }else{
            $controllerObj = new \App\controllers\NotFoundController();
         }

         if (method_exists($controllerObj , $this->action)) {

               $controllerObj->setController($this->controller);
               $controllerObj->setParams($this->params);
               $controllerObj->setMethod($this->action);
              $method = $this->action;
              $controllerObj->$method();

         }else{
               $method = "default";
               $controllerObj->$method();
         }


           
       }

}