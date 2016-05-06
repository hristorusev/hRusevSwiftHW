<?php 
	require_once 'db.php';
	function validateInputData($input_data)
					{
					$bad_strings = array("\t", "\n", "\r", "\0", "\x0B", "'", "..", "<", ">", "*", "+", "!", "^", "$", "#", "&", "=","@","}","{", ",");
					$input_data = str_replace($bad_strings, "", $input_data);
				
					$input_data = addslashes($input_data);
					$input_data = trim($input_data);
					return($input_data);
					}

	if(isset($_POST['email'])&&
	   isset($_POST['password1'])&&
	   isset($_POST['password2'])&&
	   isset($_POST['name'])&&
	   isset($_POST['date_of_birth'])&&
	   isset($_POST['place_of_birth'])&&
	   isset($_POST['info'])&&
	   isset($_POST['nationality'])&&
	   $_POST['email'] !='' &&
	   $_POST['password1'] !='' &&
	   $_POST['password2'] !='' &&
	   $_POST['name'] !='' &&
	   $_POST['date_of_birth'] !='' &&
	   $_POST['place_of_birth'] !='' &&
	   $_POST['info'] !='' &&
	   $_POST['nationality'] !='' 
	   )
		{
			$email = $_POST['email'];
			$password1 = md5($_POST['password1']);
			$password2 = md5($_POST['password2']);
			$name = validateInputData($_POST['name']);
			$date_of_birth = $_POST['date_of_birth'];
			$place_of_birth = validateInputData($_POST['place_of_birth']);
			$info = $_POST['info'];
			$nationality = validateInputData($_POST['nationality']);
			$newDate = date("d-m-Y", strtotime($date_of_birth));
			if($name!=$_POST['name'] || $nationality!=$_POST['nationality'] || $place_of_birth!=$_POST['place_of_birth'])
				{
					$error = "You use not allowed symbols!";
					echo"<script> location.replace(\"register.php?error=$error\");</script>";
				}
			else if(strtotime($newDate)>strtotime(date("d-m-Y")) || strtotime($newDate)<strtotime(date("01-01-1900"))) 
				{
					$error = "Date of birth should be before today!";
					echo"<script> location.replace(\"register.php?error=$error\");</script>";			
				}
			else if ($password1 != $password2) 
				{
					$error = "Password does not match. Try again!";
					echo "<script> location.replace(\"register.php?error=$error\");</script>";
					//header("Location: register.php?error=$error");
				}
			else
				{
					$sqlInsert = "INSERT INTO users(name, info, date_of_birth, place_of_birth, email, password,nationality) 
					        VALUES ('$name', '$info', '$date_of_birth', '$place_of_birth', '$email', '$password1', '$nationality');";
					$sqlSelect = "SELECT ID FROM users WHERE email='$email'";
					$returns[] = "ID";
					$conn = new ClassDatabase();
					$checkForUser=$conn->selectFromDB($sqlSelect,$returns);
					if(empty($checkForUser))
						{
							$newUserID = $conn->isnertInDB($sqlInsert);
							if($newUserID!=-1)
								{
									$conn->closeDBconection();
									session_start();
									$_SESSION['login'] = "OK";
									$_SESSION['logID'] = $newUserID;
									$_SESSION['username'] = $email;
									header('Location: private.php');
								}
						}
					else
						{
							$conn->closeDBconection();
							$error = "This email already has been registered!Please login!";
							echo"<script> location.replace(\"login.php?error=$error\");</script>";
							//header("Location: login.php?error=$error");
						}
					$conn->closeDBconection();
				}
		}
	else
		{
			$error = "All fields are required!";
			echo"<script> location.replace(\"register.php?error=$error\");</script>";
			//header("Location: register.php?error=$error");
		}
?>