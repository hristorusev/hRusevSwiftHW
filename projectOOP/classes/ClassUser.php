<?php
class ClassUser extends ClassMainAppObject 
{  
   protected $id;   
   protected $name;     
   protected $info;    
   protected $date_of_birth;    
   protected $place_of_birth;   
   protected $date_of_reg;   
   protected $email;    
   protected $password;   
   protected $nationality;

   public function __construct($data)
      {
          $this->id = (isset($data['id'])) ? $data['id'] : NULL;
          $this->name = (isset($data['name'])) ? $data['name'] : NULL;
          $this->info = (isset($data['info'])) ? $data['info'] : NULL;
          $this->date_of_birth = (isset($data['date_of_birth'])) ? $data['date_of_birth'] : NULL;
          $this->place_of_birth = (isset($data['place_of_birth'])) ? $data['place_of_birth'] : NULL;
          $this->date_of_reg = (isset($data['date_of_reg'])) ? $data['date_of_reg'] : NULL;
          $this->email = (isset($data['email'])) ? $data['email'] : NULL;
          $this->password = (isset($data['password'])) ? md5($data['password']) : NULL;
          $this->nationality = (isset($data['nationality'])) ? $data['nationality'] : NULL;
      }
   public function getUserDataFormDB()
      {
         $this->getDataFormDB('users',get_object_vars($this));
      }
   public function checkForUser()
      {
         /*check for user with same email*/
        $newDatabaseConnection = new ClassDatabase();
        $search = array('email' => $this->email, 'id' => NULL);
        $returnInfo = $newDatabaseConnection->selectFromDB('users',$search);
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
   public function saveUserInDB()
      {
         if(isset($this->id))
            {
               echo "This user exists!<br/>";
            }
         else
            {
               $this->saveInDB('users',get_object_vars($this));
            }
      }
   public function getId()
      {
         return $this->id;
      }
   public function getName()
      {
         return $this->name;
      }
   public function getInfo()
      {
         return $this->info;
      }
   public function getDateOfBirth()
      {
         return $this->date_of_birth;
      }
   public function getPlaceOfBirth()
      {
         return $this->place_of_birth;
      }
   public function getDateOfReg()
      {
         return $this->date_of_reg;
      }
   public function getEmail()
      {
         return $this->email;
      }
   public function getNationality()
      {
         return $this->nationality;
      }     
     
}