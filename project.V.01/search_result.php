<?php
	session_start();

	require_once "src/header.php";
	require_once "src/mainmenu.php";
	
	require_once 'db.php';

	echo "<fieldset><legend>Users</legend>";

	if(!isset($_POST['name']) || empty($_POST['name'])) 
		{
			$error = "Empty search is not allowed!";
			echo"<script> location.replace(\"search.php?error=$error\");</script>";
			//header("Location: search.php?error=$error");
		}
	else 
		{
			$name = $_POST['name'];
			$sqlSelect = "SELECT ID, NAME, DATE_OF_BIRTH FROM users WHERE name LIKE '%$name%'";
			$returns = array("ID","NAME","DATE_OF_BIRTH");
			$conn = new ClassDatabase();
			$searchForUsers=$conn->selectFromDB($sqlSelect,$returns);
			$conn->closeDBconection();
			if(!empty($searchForUsers))
				{
					echo"<div class=\"datagrid\">
							<table>
								<thead>
									<tr>
										<th>Name</th>
										<th>Date of birth</th>
										<th>Write a message</th>
									</tr>
								</thead>
								<tbody>";
					$i=0;
					foreach ($searchForUsers as $singleUser) 
						{
							$name = $singleUser['NAME'];
							$date_of_birth =date_format(date_create($singleUser['DATE_OF_BIRTH']),"d/m/y"); 
							$id = $singleUser['ID'];
							if($i%2==0) {echo "<tr>";} else {echo "<tr class=\"alt\">";}
							echo "<td>$name</td>";
							echo "<td>$date_of_birth</td>";
							if($id == $_SESSION['logID']) 
								{
									echo "<td>You can not write to yourself!</td>";
								}
							else
								{
									echo "<td><a href=\"search_full_result.php?id=$id\">send message</a></td>";
								}
							echo "</tr>";
							$i=$i+1;
						}
					echo "		</tbody>
							</table>
						</div>";
				}
			else 
				{
					$error = "No results for this criteria. Please, try again!";
					echo"<script> location.replace(\"search.php?error=$error\");</script>";
					//header("Location: search.php?error=$error");
				}
				
		}
	
	/*close($link);*/
	
	echo "</fieldset>";
	
	require_once "src/footer.php";
?>