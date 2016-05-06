<?php
	session_start();
	
	require_once "validate.php";
	require_once "src/header.php";
	require_once "src/mainmenu.php";
	require_once "db.php";
?>
	<fieldset>
	<legend>Private area</legend>
	<h2>Welcome!</h2>
	<p><a href="exit.php">Exit</a></p>
<?php
	$id = $_SESSION['logID'];
	$sqlSelect = "SELECT
					id_user_from,
					name,
					date_of_creation,
					message
				 FROM messages m
				 LEFT JOIN users u ON u.id  = m.id_user_from
				 WHERE id_user =$id
				 ORDER BY id_user_from,date_of_creation DESC";
	$returns = array("id_user_from","name","date_of_creation","message");
	$conn = new ClassDatabase();
	$searchForMessages=$conn->selectFromDB($sqlSelect,$returns);
	$conn->closeDBconection();
	if(!empty($searchForMessages))
		{
			echo"<div class=\"datagrid\">
				<table>
				<col width=\"200\">
				<thead>
				<tr>
				<th>User information</th>
				<th>Message</th>
				</tr>
				</thead>
				<tbody>";
			$prevID=0;
			foreach($searchForMessages as $singleMassage)
				{
					$name = $singleMassage['name'];
					$date = date_format(date_create($singleMassage['date_of_creation']),"d/m/y H:i:s");
					$id = $singleMassage['id_user_from'];
					$message = $singleMassage['message'];
					if($prevID!=$singleMassage['id_user_from'] && $prevID!=0)
						{
							echo "</tbody></table></div><br/>";
							echo"<div class=\"datagrid\">
								<table>
								<col width=\"200\">
								<thead>
								<tr>
								<th>User information</th>
								<th>Message</th>
								</tr>
								</thead>
								<tbody>
								<tr><td colspan=\"2\"><a href=\"search_full_result.php?id=$id\">send message</a></td></tr>";
						}
					if($prevID==0){echo "<tr><td colspan=\"2\"><a href=\"search_full_result.php?id=$id\">send message</a></td></tr>"; }	
					echo "<tr><td><b>$name</<b></td><td rowspan=\"2\">$message</td></tr>";
					echo "<tr><td><b>$date</<b></td></tr>";
					$prevID = $singleMassage['id_user_from'];
				}
			echo "</tbody></table></div>";
		}
	else
		{
			echo "<p>You have no messages!</p>";
		}
	//var_dump($_SESSION['logID']);
	require_once "src/footer.php";
?>
</fieldset>