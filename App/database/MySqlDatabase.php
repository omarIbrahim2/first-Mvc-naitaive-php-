<?php


namespace App\database;

use PDO;
use PDOException;

class MySqlDatabase extends DatabaseHandler{

   
    private static $handler;

    private static $instance;

   public function __construct()
   {
      self::connect();
   }
   
    

   private static function connect(){
     
    try {
        self::$handler = new PDO("mysql://hostname=" . DB_HOST . ";dbname=" . DB_NAME , DB_USERNAME , DB_PASSWORD );
    } catch (PDOException $e ) {
            
         echo $e->getMessage();
    }


   }



   public static function query($query){
     
        return self::$handler->prepare($query);
     

   }


   public static function getInstance(){
       
       if (self::$instance == null) {
           
             self::$instance = new self();

       }

       return self::$instance;


   }


}