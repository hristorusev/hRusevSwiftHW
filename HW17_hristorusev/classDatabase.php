<?php
 class ClassDatabase
{
   protected $serverName = "localhost";
   protected $databaseName = "forum";
   protected $username = "root";
   protected $password = "";
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
   public function isnertInDB($tableName,$columnNamesValues)
      {
            try{
                foreach ($columnNamesValues as $key => $value) 
                  {
                     $columnNames[] = $key;
                     if($value == 'CURRENT_TIMESTAMP')
                        {
                           $values[] = $value;
                        }
                     else
                        { 
                           $values[] = (isset($value))? "'".$value."'": 'NULL';
                        }
                  }
               $insertColumnNames = implode(",", $columnNames);
               $insertValuesNames = implode(",", $values);
               $sql = "INSERT INTO $tableName ($insertColumnNames) VALUES ($insertValuesNames)";
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
   public function selectFromDB($tableName,$columnNamesValues)
      {
            try{
                  foreach ($columnNamesValues as $key => $value) 
                  {
                     $columnNames[] = $key; 
                     if(isset($value))
                        {
                           $values[] = $key."='".$value."'";
                        }
                  }
                  $selectColumnNames = implode(",", $columnNames);
                  $whereColumValuesNames = implode(" AND ", $values);
                  $sql = "SELECT $selectColumnNames FROM $tableName WHERE $whereColumValuesNames";
                  //echo $sql.'<br/>';
                   $arrayResult = array();
                  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  foreach( $this->conn->query($sql) as $row)
                           {
                             foreach ($columnNames as $singleColumn) 
                             {
                                 //echo  $singleColumn.'<br/>';
                                 $arraySingleResult[$singleColumn] = $row[$singleColumn];
                             }
                             $arrayResult[] = $arraySingleResult;
                           }
                  //var_dump($arrayResult);
                  return $arrayResult;
            }  catch(PDOException $e)
            {
               echo "Connection failed: ".$e->getMessage();
               return -1;
            }
      }
}