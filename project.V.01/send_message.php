<?php
require_once 'db.php';
session_start();
if(!isset($_POST['text']) || empty($_POST['text']) || !isset($_GET['touser']) || empty($_GET['touser']))
	{
		$id = $_GET['touser'];
		$error = "Please write something!";
		echo"<script> location.replace(\"search_full_result.php?id=$id&sendSuccess=$error\");</script>";
		//header("Location: search_full_result.php?id=$id&sendSuccess=$error");
	}
else
	{
		$id_user = $_GET['touser'];
		$id_user_from = $_SESSION['logID'];
		$message = $_POST['text'];
		$sqlInsert = "INSERT INTO messages(id_user, id_user_from, message) 
					  VALUES ($id_user, $id_user_from, '$message');";
		$conn = new ClassDatabase();
		$newMessageID = $conn->isnertInDB($sqlInsert);
		if($newMessageID!=-1)
			{
				$success = "Successfully sent!";
				echo"<script> location.replace(\"search_full_result.php?id=$id_user&sendSuccess=$success\");</script>";
				//header("Location: search_full_result.php?id=$id_user&sendSuccess=$success");
			}
		else
			{
				$error = "Something went wrong. Please, try again!";
				echo"<script> location.replace(\"search_full_result.php?id=$id_user&sendSuccess=$error\");</script>";
				//header("Location: search_full_result.php?id=$id_user&sendSuccess=$error");
			}
		$conn->closeDBconection();
	}  
?>