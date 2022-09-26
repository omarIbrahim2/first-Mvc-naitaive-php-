<?php

namespace App\controllers;



class NotFoundController extends AbstractController{

     

    public function default()
    {
        $this->view("NotFoundView");
    }

}