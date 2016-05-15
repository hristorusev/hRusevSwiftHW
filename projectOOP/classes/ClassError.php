<?php
class ClassError
{
	protected $errorText;
	protected $location;
	public function __construct($errorText, $lacation)
			{
				$this->errorText = $errorText;
				$this->lacation = $lacation;
			}
	public function createErrorRedirection()
			{
				$redirectTo = "<script> location.replace(\"".$this->lacation."?error=".$this->errorText."\");</script>";
				return $redirectTo;
			}
}
?>