<?php
	class ClassDatabase
{
   protected $serverName = "localhost";
   protected $databaseName = "project";
   protected $username = "root";
   protected $password = "9112188466";
   protected $isActive = false;
   protected $conn = NULL;
   public function __construct()
      {
         if($this->isActive===false)
         {
             try {
               $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->databaseName", $this->username, $this->password);
               $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $this->isActive=true;
             } catch(PDOException $e) {
               echo "Connection failed: ".$e->getMessage();
             }
         }
      }
   public function closeDBconection()
      {
         $this->isActive=false;
         $this->conn = NULL;
      }
   public function isnertInDB($sql)
      {
            try{
               $sql = $sql;
               //echo $sql;
               $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $this->conn->exec($sql);
               return  $this->conn->lastInsertId();
            } catch(PDOException $e) 
            {
                echo "Connection failed: ".$e->getMessage();
               return -1;
            }
      }
    public function selectFromDB($sql,$returns)
      {
            try{
                  $sql = $sql;
                  $returns = $returns;
                  $arrayResult = array();
                  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  foreach( $this->conn->query($sql) as $row)
                           {
                                foreach ($returns as $key) 
                                  {
                                     $arraySingleResult[$key] = $row[$key];
                                  }
                             $arrayResult[] = $arraySingleResult;
                           }
                  return $arrayResult;
            }  catch(PDOException $e)
            {
               echo "Connection failed: ".$e->getMessage();
               return -1;
            }
      }
}


?>