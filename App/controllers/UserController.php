<?php

namespace App\controllers;

use App\models\user;

class UserController extends AbstractController{

   

    public function index()
    {
        $this->data["users"] =  user::select("name" , "email")->getAll();
         $this->view("userIndex");
    }


}