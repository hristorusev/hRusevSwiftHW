<?php
class ClassListUsers extends ClassListResult
{
	protected $listUsers;
	protected $searchCriteria;

	public function __construct($searchCriteria)
		{
			$this->searchCriteria = "%".$searchCriteria['name']."%";
			$this->listUsers = NULL;
		}
	public function getResults()
		{
			$newDatabaseConnection = new ClassDatabase();
        	$search = array('id'=>NULL,
        				 	'name'=>$this->searchCriteria,
        				 	'date_of_birth'=>NULL);
        	$returnInfo = $newDatabaseConnection->selectFromDB('users',$search,1);
        	if(empty($returnInfo))
        		{
        			$error = "No results for this criteria!";
					return $error;
        		}
        	else
        		{
        			foreach ($returnInfo as $singleUserInfo) {
        				 foreach ($singleUserInfo as $key => $value) {
        				 	$singleUserInfoArray[$key] = $value;
        				 }
        				 $singleUser = new ClassUser($singleUserInfoArray);
        				 $this->listUsers[]=$singleUser;
        			}
        			return 1;
        		}
        	$newDatabaseConnection->closeDBconection();
		}
	public function displayResults()
		{
			/*echo '<pre>';
			var_dump($this->listUsers);
			echo '</pre>';*/

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
					foreach ($this->listUsers as $singleUser) 
						{
							$name = $singleUser->getName();
							$date_of_birth =date_format(date_create($singleUser->getDateOfBirth()),"d/m/y"); 
							$id = $singleUser->getId();
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
}
?>