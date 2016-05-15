<?php
	session_start();
	if(!isset($_GET['id']) || empty($_GET['id'])) {
		header('Location: search.php');
	}
	// Check if the user is logged into the system
	require_once "validate.php";
	require_once "src/header.php";
	require_once "src/mainmenu.php";
	require_once 'require_classes.php';
	echo "<fieldset><legend>User Information</legend>";
	$singleUser = new ClassUser($_GET);
	$singleUser->getUserDataFormDB();
	$id = $singleUser->getId();
	$sendSuccess = '';
	if($singleUser->getEmail()!=NULL)
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
							if(isset($_GET['sendSuccess']))
								{
									$sendSuccess ="<tr><td>".$_GET['sendSuccess']."</tr></td>";
								}
							$form = "<form method=\"post\" action=\"send_message.php?id_user=$id\">
									 <table>
										<tr>
											<td>
												<textarea rows=\"10\" style=\"margin: 0px 6.65625px 0px 0px; height: 150px; width: 457px;\" name=\"message\"></textarea>
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
							$name = $singleUser->getName();
							$email = $singleUser->getEmail();
							$info = $singleUser->getInfo();
							$date_of_birth = date_format(date_create($singleUser->getDateOfBirth()),"d/m/y"); 
							$place_of_birth = $singleUser->getPlaceOfBirth();
							$date_of_reg =  date_format(date_create($singleUser->getDateOfReg()),"d/m/y"); 
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
					echo "		</tbody>
							</table>
						</div>";
		}
	
	
	echo "</fieldset>";
	
	require_once "src/footer.php";
?>