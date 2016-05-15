<?php
	session_start();
	$_SESSION['searchAllowed'] = 'N';
	require_once "validate.php";
	require_once "src/header.php";
	require_once "src/mainmenu.php";
?>
	<form method="post" action="search_result.php">
	<fieldset>
	<legend>Search</legend>
	<p><label for="name">Name:</label> <input type="text" name="name" id="name" /></p>
	<p class="center"><input type="submit" value="Search" /></p>
	<p class="center red"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
	</fieldset>
	</form>
<?php	
	require_once "src/footer.php";
?>