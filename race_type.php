<?php

class race_type {
	var $id;
	var $name;

	function copyResultToObj($row) {
		$this->id = $row['id'];
		$this->name = $row['name'];
	}

	function getFromDB() {
		$sql = sprintf("select * from race_type where id = %d",
			mysql_real_escape_string($this->id));
		$result = mysql_query($sql) or error_log('Error: ' . mysql_error() .' sql = ' . $sql);
		if (mysql_num_rows($result) == 1) {
			$row = mysql_fetch_array($result);
			$this->copyResultToObj($row);	
		}
	}
}

?>
