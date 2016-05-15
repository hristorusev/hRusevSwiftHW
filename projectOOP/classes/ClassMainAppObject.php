<?php
class ClassMainAppObject
	{
		 protected function getDataFormDB($table, $data)
			      {
			         $newDatabaseConnection = new ClassDatabase();
			         $returnInfo = $newDatabaseConnection->selectFromDB($table,$data);
			         if(count($returnInfo)==1)
			               { 
			                  //var_dump($returnInfo);
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
		 protected function saveInDB($table, $data)
		 		  {
		 		  	$newDatabaseConnection = new ClassDatabase();
               		$id = $newDatabaseConnection->isnertInDB($table,$data);
               		$this->id = ($id!=-1) ? $id : NULL;
               		$newDatabaseConnection->closeDBconection();
		 		  }	
	}
?>