<?php

namespace App\controllers;

abstract class  AbstractController{
    
    
    protected $data = [];
   
    protected $controller;
    
    protected $action;

    protected $params;
   

    public function default(){
        echo "not found";
      }



     public function setParams($params){

        $this->params = $params;
     }

     public function setMethod($action){
         
        $this->action = $action;
     }


     public function setController($controller){

        $this->controller = $controller;
     }

     public function view($path){
        
       $view = VIEW_PATH . '/' . $path . ".php";

       if (file_exists($view)) {
          extract($this->data);
          require_once $view;
       }else{
          require_once VIEW_PATH . '/'. 'NotFoundView.php';
       }

       //return $this;

     }



     public function redirect($path){
         
         session_write_close();
        header("location:http://mvc.host/$path");

        exit;

     }



   
      
    

    

    




}