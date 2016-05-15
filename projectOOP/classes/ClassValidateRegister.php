<?php 
class ClassValidateRegister extends ClassValidateData
{
	public function __construct($data)
		 {
			parent::__construct($data);
		 }
	public function validateData()
		 {
					if( isset($this->data['email']) &&
	   					isset($this->data['password']) &&
	   					isset($this->data['password2']) &&
	   					isset($this->data['name']) &&
						isset($this->data['date_of_birth']) &&
						isset($this->data['place_of_birth']) &&
						isset($this->data['info']) &&
						isset($this->data['nationality']) &&
						$this->data['email'] !='' &&
	   					$this->data['password'] !='' &&
	   					$this->data['password2'] !='' &&
	   					$this->data['name'] !='' &&
						$this->data['date_of_birth'] !='' &&
						$this->data['place_of_birth'] !='' &&
						$this->data['info'] !='' &&
						$this->data['nationality'] !='')
						{
								$newDate = date("d-m-Y", strtotime($this->data['date_of_birth']));
								if( $this->data['name'] != $this->singleValidate($this->data['name']) ||
									$this->data['place_of_birth'] != $this->singleValidate($this->data['place_of_birth']) ||
									$this->data['nationality'] != $this->singleValidate($this->data['nationality']))
									{
										$error =  "You use not allowed symbols!";
										return $error;
									}
								elseif(strtotime($newDate)>strtotime(date("d-m-Y")) || strtotime($newDate)<strtotime(date("01-01-1900")))
									{
										$error = "Date of birth should be before today and after 01.01.1900!";
										return $error;
									}
								elseif($this->data['password'] != $this->data['password2'])
									{
										$error = "Password does not match. Try again!";
										return $error;
									}
								else
									{
										return 1;
									} 
						}
					else
						{
							$error =  "All fields are required!";
							return $error; 
						}
		}
}
?>