<?php

namespace App\controllers;

use App\models\user;
use App\vendor\Validator;

class UserController extends AbstractController{

   

    public function index()
    {
        $this->data["users"] =  user::select("name" , "email" , "id")->getAll();
         $this->view("userIndex");
    }


    public function create(){


        $this->view("registerUser");
       
    }


    public function insert(){

        if (isset($_POST["submit"])) {


            Validator::Required($_POST["email"]);
            Validator::Required($_POST["name"]);
            Validator::Required($_POST["password"]);
            Validator::email($_POST["email"]);

            if (Validator::validateFails() == true) {
                
                
                $_SESSION["errors"] = Validator::getErrors();
                $this->redirect("user/create");
            }else{
                unset($_POST["submit"]);
                
               if (user::create($_POST)) {
                  $_SESSION["success"] = "user created successfully"; 
               
                  $this->redirect("user/index");
                  
               } 
                 
            }
            
        }
    }

     public function edit(){
        
            $id = filter_var($this->params[0] , FILTER_SANITIZE_NUMBER_INT);

            $user = user::find($id);

            if ($user !== false) {
                $this->data["user"] = $user;

                $this->view("editUser");
            
            }else{

                $this->redirect("user/index");
                exit;
            }
    
            
     }


     public function update(){

     if (isset($_POST["submit"])) {

        Validator::Required($_POST["email"]);
        Validator::Required($_POST["name"]);
        Validator::Required($_POST["password"]);
        Validator::email($_POST["email"]);


        if (Validator::validateFails() == true) {
                
                
            $_SESSION["errors"] = Validator::getErrors();
            $id = $_POST['id'];
            $this->redirect("user/edit/$id");
        }else{
             
            unset($_POST["submit"]);
             

        }

        
                    
    }
              

     }

}