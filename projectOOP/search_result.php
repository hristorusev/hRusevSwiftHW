<?php
	session_start();

	require_once "src/header.php";
	require_once "src/mainmenu.php";
	require_once 'require_classes.php';

	echo "<fieldset><legend>Users</legend>";

	$validation = new ClassValidateSearch($_POST);
	if($validation->validateData() == 1)
		{
			$searchUsers = new ClassListUsers($_POST);
			if($searchUsers->getResults() == 1)
				{
					$searchUsers->displayResults();
				}
			else
				{
					$displayError = new ClassError($searchUsers->getResults(),'search.php');
					echo $displayError->createErrorRedirection();
				}
		}
	else
		{
			$displayError = new ClassError($validation->validateData(),'search.php');
			echo $displayError->createErrorRedirection();
		}

	echo "</fieldset>";
	
	require_once "src/footer.php";
?>