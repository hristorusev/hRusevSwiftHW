<?php
class ClassUser 
{  
   protected $id;
   protected $username;
   protected $password;
   protected $email;
   protected $first_name;
   protected $last_name;
   public function __construct($data)
      {
          $this->id = (isset($data['id'])) ? $data['id'] : NULL;
          $this->username = (isset($data['username'])) ? $data['username'] : NULL;
          $this->password = (isset($data['password'])) ? $data['password'] : NULL;
          $this->email = (isset($data['email'])) ? $data['email'] : NULL;
          $this->first_name = (isset($data['first_name'])) ? $data['first_name'] : NULL;
          $this->last_name = (isset($data['last_name'])) ? $data['last_name'] : NULL;
      }
   public function saveUserInDB()
      {
         if(isset($this->id))
            {
               echo "This user exist!<br/>";
            }
         else
            {
               $newDatabaseConnection = new ClassDatabase();
               $id = $newDatabaseConnection->isnertInDB('users',get_object_vars($this));
               $this->id = ($id!=-1) ? $id : NULL;
               $newDatabaseConnection->closeDBconection();
               //echo "Successfully insert user with $id id!<br/>";
            }
      }
   public function getUserInfoFromDB()
      { 
         $newDatabaseConnection = new ClassDatabase();
         $returnInfo = $newDatabaseConnection->selectFromDB('users',get_object_vars($this));
         //var_dump($returnInfo);
         if(count($returnInfo)==1)
               {
                  foreach ($returnInfo as $singleUserInfo) 
                     {
                           foreach ($singleUserInfo as $key => $value) 
                           {
                              $this->$key = $value;
                           }
                     }
               }
         $newDatabaseConnection->closeDBconection();
      }
   public function getId()
      {
         return $this->id;
      }
   public function getUsername()
      {
         return $this->username;
      }
   public function getPassword()
      {
         return $this->password;
      }
   public function getEmail()
      {
         return $this->email;
      }
   public function getFirst_name()
      {
         return $this->first_name;
      }
   public function getLirst_name()
      {
         return $this->last_name;
      }
}




























