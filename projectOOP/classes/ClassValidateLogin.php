<?php
class ClassValidateLogin extends ClassValidateData
	{
		public function __construct($data)
				{
					parent::__construct($data);
				}
		public function validateData()
				{
					if(isset($this->data['email']) &&
	   				   isset($this->data['password']) &&
	   				   $this->data['email'] !='' &&
	   				   $this->data['password'] !='')
							{
								return 1;
							}
					else
							{
								$error = "Username and Password are required!";
								return $error;
							}
				}
	}
?>