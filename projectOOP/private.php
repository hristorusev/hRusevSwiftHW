<?php
	session_start();
	
	require_once "validate.php";
	require_once "src/header.php";
	require_once "src/mainmenu.php";
	require_once "require_classes.php";
?>
	<fieldset>
	<legend>Private area</legend>
	<h2>Welcome!</h2>
	<p><a href="exit.php">Exit</a></p>
<?php
	$id = $_SESSION['logID'];
	$userMessages = new ClassListMessages($id);
	if($userMessages->getResults()==1)
		{
			$userMessages->displayResults();
		}
	else
		{
			echo "<p>You have no messages!</p>";
		}
	//var_dump($_SESSION['logID']); */
	require_once "src/footer.php";
?>
</fieldset>