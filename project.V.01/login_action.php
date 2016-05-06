<?php
	session_start();
	if(isset($_SESSION['login']) && $_SESSION['login'] == "OK") 
		{
			header('Location: private.php');
		}	
	require_once "db.php";
	if(isset($_POST['email']) &&  
	   isset($_POST['password']) &&
	   $_POST['email']!=''  && 
	   $_POST['password']!=''
	   )
		{
			$email = $_POST['email'];
			$password =  md5($_POST['password']);
			$sqlSelect = "SELECT ID FROM users WHERE email = '$email' AND password = '$password'";
			$returns[] = "ID";
			$conn = new ClassDatabase();
			$checkForUser=$conn->selectFromDB($sqlSelect,$returns);
			$conn->closeDBconection();
			if(!empty($checkForUser))
				{
					$_SESSION['login'] = "OK";
					$_SESSION['logID'] = $checkForUser[0]['ID'];
					$_SESSION['username'] = $email;
					header('Location: private.php');
				}
			else
				{
					$error = "Username or Password are incorrect!";
					echo"<script> location.replace(\"login.php?error=$error\");</script>";
					//header("Location: login.php?error=$error");
				}	

		}
	else 
		{
			$error = "Username and Password are required!";
			echo"<script> location.replace(\"login.php?error=$error\");</script>";
			//header("Location: login.php?error=$error");
		}
	
?>