<?php

require_once("race_type.php");
require_once("competitor.php");
require_once("race_competitor.php");
require_once("meeting.php");

class race {
	var $id;
	var $race_type;
	var $closing_time;
	var $meeting;
	var $countdown_time;
	var $competitor_list = array();

	function __construct() {
		$this->race_type = new race_type();
		$this->meeting = new meeting();
	}

	function copyResultToObj($row) {
		$this->id = $row['id'];	
		$this->race_type->id = $row['race_type_id'];
		$this->closing_time = $row['closing_time'];
		$this->meeting->id = $row['meeting_id'];
	}

	function getFromDB() {
		$sql = sprintf("select * from race where id = %d",
			mysql_real_escape_string($this->id));
		$result = mysql_query($sql) or error_log('Error: ' . mysql_error() .' sql = ' . $sql);
		if (mysql_num_rows($result) == 1) {
			$row = mysql_fetch_array($result);
			$this->copyResultToObj($row);
		}
	}

	function getNext5() {
		$list = array();
		$sql = sprintf("select * from race where closing_time >= now() order by closing_time asc limit 5");
		$result = mysql_query($sql) or error_log('Error: ' . mysql_error() .' sql = ' . $sql);
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				$r = new race();
				$r->copyResultToObj($row);
				$r->meeting->getFromDB();
				$r->race_type->getFromDB();
				$r->countdown_time = $row['countdown_time'];
				array_push($list, $r);
				unset($r);
			}		
		}
		return $list;
	}

	function getCompetitorList() {
		$sql = sprintf("select rc.id as rc_id, rc.position, c.id as c_id, c.name from race_competitor rc, competitor c where rc.competitor_id = c.id and rc.race_id = %d order by rc.position",
			mysql_real_escape_string($this->id));
		$result = mysql_query($sql) or error_log('Error: ' . mysql_error() . ' sql = '. $sql);
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				$rc = new race_competitor();
				$rc->id = $row['rc_id'];
				$rc->competitor->id = $row['c_id'];
				$rc->competitor->name = $row['name'];
				$rc->position = $row['position'];
				array_push($this->competitor_list, $rc);
				unset($rc);
			}
		}
	}
}
?>
