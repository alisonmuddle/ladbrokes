<?php

require_once ("race.php");
require_once ("competitor.php");

class race_competitor {
	var $id;
	var $race;
	var $competitor;
	var $position;

	function __construct() {
		$this->race = new race();
		$this->competitor = new competitor();
	}
}

?>
