<?php
class ClassValidateData
{
	protected $data;
	public function __construct($data)
		 {
			$this->data = $data;
		 }
	protected function singleValidate($input_data)
			{
			 $bad_strings = array("\t", "\n", "\r", "\0", "\x0B", "'", "..", "<", ">", "*", "+", "!", "^", "$", "#", "&", "=","@","}","{", ",","%");
			 $input_data = str_replace($bad_strings, "", $input_data);
			 $input_data = addslashes($input_data);
			 $input_data = trim($input_data);
			 return($input_data);
			}
	protected function validateData()
			{
			}
	public function getData()
		 {
			return $this->data;
		 } 
}

?>