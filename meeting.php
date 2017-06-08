<?php

require_once("race_type.php");

class meeting {
	var $id;
	var $name;
	var $race_type;

	function __construct() {
		$this->race_type = new race_type();
	}

	function copyResultToObj($row) {
		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->race_type->id = $row['race_type_id'];
	}

	function getFromDB() {
		$sql = sprintf("select * from meeting where id = %d",
			mysql_real_escape_string($this->id));
		$result = mysql_query($sql) or error_log('Error: ' . mysql_error() . ' sql = ' . $sql);
		if (mysql_num_rows($result) == 1) {
			$row = mysql_fetch_array($result);
			$this->copyResultToObj($row);
		}
	}
}
?>
