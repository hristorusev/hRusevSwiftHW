<?php
class ClassListMessages extends ClassListResult
{
	protected $listMessages;
	protected $ownerId;

	public function __construct($ownerId)
		{
			$this->ownerId = $ownerId;
			$this->listMessages = NULL;
		}
	public function getResults()
		{
			$newDatabaseConnection = new ClassDatabase();
        	$search = array( 'message' => NULL,
               				 'date_of_creation' => NULL,
               				 'id_user_from' =>  NULL,
               				 'id_user' => $this->ownerId);
        	$returnInfo = $newDatabaseConnection->selectFromDB('messages m LEFT JOIN users u ON u.id  = m.id_user_from',$search,1,1);
        	if(empty($returnInfo))
        		{
        			$error = "No results for this criteria!";
					return $error;
        		}
        	else
        		{
        			foreach ($returnInfo as $singleMessageInfo) {
        				 foreach ($singleMessageInfo as $key => $value) {
        				 	$singleMessageInfoArray[$key] = $value;
        				 }
        				
        				 $singleMessage = new ClassMessage($singleMessageInfoArray);
        				 $this->listMessages[]=$singleMessage;
        			}
        			return 1;
        		}
        	$newDatabaseConnection->closeDBconection();
		}
	public function displayResults()
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
			foreach($this->listMessages as $singleMassage)
				{
					$name = $singleMassage->getSender()->getName();
					$date = date_format(date_create($singleMassage->getDate()),"d/m/y H:i:s");
					$id = $singleMassage->getSender()->getId();
					$message = $singleMassage->getMessage();
					if($prevID!=$id && $prevID!=0)
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
					$prevID = $id;
				}
			echo "</tbody></table></div>";

		}
}
?>