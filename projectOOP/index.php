<?php
	session_start();
	
	require_once "src/header.php";
	require_once "src/mainmenu.php";

?>
	<fieldset>
	<h2>Welcome to Facebook!!!</h2>
	<p class="center red"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
	<p>
	Your can start to <a href="register.php">register</a> as a new user.
	Then, you can <a href="search.php">search</a> others users.
	And you can <a href="login.php">login</a> to access your private area.
	</p>
	</fieldset>
<?php	
	require_once "src/footer.php";
?>