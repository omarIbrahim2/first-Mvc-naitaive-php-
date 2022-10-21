<?php


namespace App\models;

use App\database\DatabaseHandler;
use App\database\MySqlDatabase;

abstract class model{

 private static $query;

  protected static $tableName;

  protected static $className;


 public static function getAll(){
    
    if (strlen(self::$query) == 0) {
        self::$query = "SELECT * FROM" . " " . static::$tableName;

    }else{

            self::$query .= " FROM". " ". static::$tableName;
        }

       

       $stmt =  DatabaseHandler::factory()->query(self::$query);

       $stmt->execute();

      return $stmt->fetchAll(\PDO::FETCH_CLASS , static::$className);
  }


  public static function find($id){
       
    self::$query = "SELECT * FROM". " ".static::$tableName. " " . "WHERE id=". ":id".";";

     $stmt = DatabaseHandler::factory()->query(self::$query);

     $stmt->bindParam("id" , $id , \PDO::PARAM_INT);
     
     $stmt->execute();
       
      $result = $stmt->fetchAll(\PDO::FETCH_CLASS , static::$className);

      return count($result) < 1 ? false :  array_pop($result);

  }


  public static function select(...$params){
    self::$query = "select";

    for ($i=0; $i < count($params) ; $i++) { 
      self::$query.= " " . $params[$i] . ' ,';
   }

   $queryArr =  explode(' ' , self::$query , -1);
    self::$query = implode(" " ,$queryArr);

    return  new static::$className;       
  }

    
 public static function create($user){
   
  self::$query = "INSERT INTO " . " ". static::$tableName . " SET";
    
  self::$query = self::buildQuery($user , self::$query);

  self::$query .= ";";

   $stmt = DatabaseHandler::factory()->query(self::$query);


   return $stmt->execute();

 }
 
 

 private static function buildQuery($values , $query){
  
  foreach($values as $key=>$index){
    $query .= " ".$key."="."'$index'"." ". ",";
   }

      $queryInArr = explode(" " , $query , -1);
      $query = implode(" " , $queryInArr);
       

       return $query;   

 }

  

}



  

