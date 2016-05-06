<?php
	session_start();

	require_once "src/header.php";
	require_once "src/mainmenu.php";
	if(isset($_SESSION['login']) && $_SESSION['login'] == "OK") 
		{
			$error = "You are already registered and logged in!";
			echo"<script> location.replace(\"index.php?error=$error\");</script>";
			//header("Location: index.php?error=$error");
		}
?>
	<form method="post" action="login_action.php">
	<fieldset>
	<legend>Login</legend>
	<p><label for="username">Email:</label> <input type="email" name="email" id="email" /></p>
	<p><label for="password">Password:</label> <input type="password" name="password" id="password" /></p>
	<p class="center"><input value="Login" type="submit" class="center" /></p>
	<p class="center red"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
	</fieldset>
	</form>

<?php 
	require_once "src/footer.php";
?>