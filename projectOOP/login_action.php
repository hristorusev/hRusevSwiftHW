<?php
	session_start();
	if(isset($_SESSION['login']) && $_SESSION['login'] == "OK") 
		{
			header('Location: private.php');
		}	
	require_once 'require_classes.php';
	$validation = new ClassValidateLogin($_POST);
	if($validation->validateData() == 1)
		{
			$logUser = new ClassUser($_POST);
			$logUser->getUserDataFormDB();
			if($logUser->getId()==NULL)
			{
				$displayError = new ClassError('Username or Password are incorrect!','login.php');
				echo $displayError->createErrorRedirection();
			}
			else
			{
				session_start();
				$_SESSION['login'] = "OK";
				$_SESSION['logID'] = $logUser->getId();
				$_SESSION['username'] = $logUser->getEmail();
				header('Location: private.php');
			}
		}
	else
		{
			$displayError = new ClassError($validation->validateData(),'login.php');
			echo $displayError->createErrorRedirection();
		}
	
?>