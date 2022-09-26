<?php


namespace App\controllers;



class IndexController extends AbstractController{
     
   public function default(){
      
       $this->view("IndexView");
   }

}