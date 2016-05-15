<?php 
	require_once 'require_classes.php';
	$validation = new ClassValidateRegister($_POST);
	if($validation->validateData() == 1)
		{
			//echo '<pre>';
			//var_dump($_POST);
			$newUser = new ClassUser($_POST);
			$newUser->checkForUser();
			if($newUser->getId()!=NULL)
			{
				$displayError = new ClassError('This email already has been registered!Please login!','login.php');
				echo $displayError->createErrorRedirection();
			}
			else
			{
				$newUser->saveUserInDB();
				session_start();
				$_SESSION['login'] = "OK";
				$_SESSION['logID'] = $newUser->getId();
				$_SESSION['username'] = $newUser->getEmail();
				header('Location: private.php');
			}
		}
	else
		{
			$displayError = new ClassError($validation->validateData(),'register.php');
			echo $displayError->createErrorRedirection();
		}
	
?>