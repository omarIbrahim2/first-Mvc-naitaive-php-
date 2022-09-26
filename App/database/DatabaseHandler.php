<?php


namespace App\database;

abstract class DatabaseHandler{
 
    private static $db = DATABASE;

  
     public static function factory(){

      if (self::$db == "mysql") {
          return MySqlDatabase::getInstance();
      }



     }

}