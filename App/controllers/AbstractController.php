<?php

namespace App\controllers;

abstract class  AbstractController{
    
    
    protected $data = [];

    public function default(){
        echo "not found";
      }


     public function view($path){
        
       $view = VIEW_PATH . '/' . $path . ".php";

       if (file_exists($view)) {
          extract($this->data);
          require_once $view;
       }else{
          require_once VIEW_PATH . '/'. 'NotFoundView.php';
       }

       return $this;

     }


    

    




}