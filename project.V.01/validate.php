<?php
	//if session does not have "login" key or "login" key is not equal to "OK"
	// header location login.php and exit script
	if(!isset($_SESSION['login']) || $_SESSION['login'] != "OK") 
		{ 
			if(!isset($_SESSION['searchAllowed']))
				{
					echo"<script> location.replace(\"login.php\");</script>";
					//header("Location: login.php");
				}
			else
				{
					$error="Search is allowed only for logged users!";
					echo"<script> location.replace(\"login.php?error=$error\");</script>";
					//header("Location: login.php?error=$error");
				}	
		}
	else
		{
			if(isset($_SESSION['searchAllowed']))
				{
					unset($_SESSION['searchAllowed']);
				}
		}
?>