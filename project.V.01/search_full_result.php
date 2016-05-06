<?php
	session_start();

	if(!isset($_GET['id']) || empty($_GET['id'])) {
		header('Location: search.php');
	}
	// Check if the user is logged into the system
	require_once "validate.php";
	require_once "src/header.php";
	require_once "src/mainmenu.php";

	require_once 'db.php';
	echo "<fieldset><legend>User Information</legend>";

	$id = $_GET['id'];
	$sqlSelect = "SELECT NAME, EMAIL, INFO, DATE_OF_BIRTH, PLACE_OF_BIRTH, DATE_OF_REG FROM users WHERE ID = $id";
	$results = array("NAME", "EMAIL", "INFO", "DATE_OF_BIRTH", "PLACE_OF_BIRTH", "DATE_OF_REG");
	$conn = new ClassDatabase();
	$searchForUser=$conn->selectFromDB($sqlSelect,$results);
	$conn->closeDBconection();
	if(!empty($searchForUser))
		{
			echo"<div class=\"datagrid\">
					<table>
						<thead>
							<tr>
								<th>User information</th>
								<th>Write a message</th>
							</tr>
						</thead>
						<tbody>";
					$i=0;
					foreach ($searchForUser as $singleUser) 
						{
							$sendSuccess = '';
							if(isset($_GET['sendSuccess']))
								{
									$sendSuccess ="<tr><td>".$_GET['sendSuccess']."</tr></td>";
								}
							$form = "<form method=\"post\" action=\"send_message.php?touser=$id\">
									<table>
										<tr>
											<td>
												<textarea rows=\"10\" style=\"margin: 0px 6.65625px 0px 0px; height: 150px; width: 457px;\" name=\"text\"></textarea>
											</td>
										</tr>
										<tr>
											<td>
												<input value=\"Send\" type=\"submit\" class=\"center\"/>
											</td>
										</tr>
										$sendSuccess
									</table>
									</form>";
							$name = $singleUser['NAME'];
							$email = $singleUser['EMAIL'];
							$info = $singleUser['INFO'];
							$date_of_birth = date_format(date_create($singleUser['DATE_OF_BIRTH']),"d/m/y"); 
							$place_of_birth = $singleUser['PLACE_OF_BIRTH'];
							$date_of_reg =  date_format(date_create($singleUser['DATE_OF_REG']),"d/m/y"); 
							echo "<tr><td><b>Name</<b></td><td rowspan=\"12\">$form</td></tr>";
							echo "<tr><td>$name</td></tr>";
							echo "<tr><td><b>Email</b></td></tr>";
							echo "<tr><td>$email</td></tr>";
							echo "<tr><td><b>Info</b></td></tr>";
							echo "<tr><td>$info</td></tr>";
							echo "<tr><td><b>Date of brith</b></td></tr>";
							echo "<tr><td>$date_of_birth</td></tr>";
							echo "<tr><td><b>Place of birth</b></td></tr>";
							echo "<tr><td>$place_of_birth</td></tr>";
							echo "<tr><td><b>Date of registration</b></td></tr>";
							echo "<tr><td>$date_of_reg</td></tr>";
						}
					echo "		</tbody>
							</table>
						</div>";
				}
	/*$result = query($sql, $link);
	
	if ($result == false) {
		echo "<p>Error: cannot execute query</p>";
	}
	else {
		$num_rows = //count all results from database => ($result);

		if ($num_rows >= 1) {
			while($row = FETCH_AS_ARRAY($result)) {
				echo "<p>";
				echo "<b>Name:</b> " . $row["name"] . "<br />";
				echo "<b>Date of birth:</b> " . $row["date_of_birth"] . "<br />";
				echo "<b>Date of registration:</b> " . $row["date_of_reg"] . "<br />";
				echo "<b>Email:</b> " . $row["email"] . "<br />";
				echo "<b>Information:</b> " . $row["info"];
				echo "</p>";
			}
		}
		else {
			echo "<p>No user</p>";
		}
	}
	
	close($link);*/
	
	echo "</fieldset>";
	
	require_once "src/footer.php";
?>