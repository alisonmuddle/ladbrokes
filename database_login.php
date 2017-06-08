<?php

function connectToLadbrokesDB() {
	$con = mysql_connect("localhost", "username", "password");
	if (!$con) {
		error_log('Could not connect: ' . mysql_error());
	}
	mysql_select_db("ladbrokes", $con);
}
?>
