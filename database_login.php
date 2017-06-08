<?php

function connectToLadbrokesDB() {
	$con = mysql_connect("localhost", "comp_admin", "comp123");
	if (!$con) {
		error_log('Could not connect: ' . mysql_error());
	}
	mysql_select_db("ladbrokes", $con);
}
?>
