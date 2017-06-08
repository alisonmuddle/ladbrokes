<?php
require_once("database_login.php");
require_once("race.php");

$con = connectToLadbrokesDB();

$race = new race();
switch ($_SERVER['REQUEST_METHOD']) {
	case "GET":	if (isset($_GET['race_id'])) {
				$race->id = $_GET['race_id'];
				$race->getFromDB();
				$race->race_type->getFromDB();
				$race->meeting->getFromDB();
				$race->getCompetitorList();
				
				echo json_encode($race);
			}
			else {	
				$list = $race->getNext5(); 	
				echo json_encode($list);
			}
			break;
		

}
mysql_close($con);

?>
