<?php
class ClassValidateMessage extends ClassValidateData
{
	public function __construct($data)
		 {
			parent::__construct($data);
		 }

	public function validateData()
		 {
			if(isset($this->data['message']) &&
			   isset($this->data['id_user']) &&
	   		   $this->data['message'] !='' &&
	   		   $this->data['id_user'] !=''
	   		   )
				{
					return 1;
				}
			else
				{
					$error = "Please write something!";
					return $error;
				}
		 }	
}	
?>