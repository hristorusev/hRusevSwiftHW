<?php
class ClassValidateSearch extends ClassValidateData
{
	public function __construct($data)
		 {
			parent::__construct($data);
		 }

	public function validateData()
		 {
			if(isset($this->data['name']) &&
	   		   $this->data['name'] !='')
				{
					if($this->data['name'] != $this->singleValidate($this->data['name']))
						{
							$error = "You use not allowed symbols!";
							return $error;	
						}
					else 
						{
							return 1;
						}
				}
			else
				{
					$error = "Empty search is not allowed!";
					return $error;
				}
		 }	
}	
?>