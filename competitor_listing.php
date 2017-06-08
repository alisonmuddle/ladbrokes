<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Competitor Listing</title>
	<link rel="stylesheet" type="text/css" href="/styles/styles.css"/>
<script type="text/javascript" src="/scripts/k9_lib.js"></script>
<script>

</script>
    </head>
<div class="container-fluid">

<form ng-app='competitorListApp' ng-controller='competitorListCtrl'>  
<h3>Race Details</h3>
<br>
<div class='row form-group'>
  <div class='col-xs-2'><label>Meeting: </label></div>
  <div class='col-xs-3'>{{raceDetails.meeting.name}}</div>
</div>

<div class='row form-group'>
  <div class='col-xs-2'><label>Closing Time: </label></div>
  <div class='col-xs-3'>{{raceDetails.closing_time}}</div>
</div>

<div class='row form-group'>
  <div class='col-xs-2'><label>Race Type: </label></div>
  <div class='col-xs-3'>{{raceDetails.race_type.name}}</div>
</div>

<table>
<thead>
<th>Competitor</th>
<th>Position</th>
</thead>
<tbody>
<tr ng-repeat='c in raceDetails.competitor_list'>
  <td>{{c.competitor.name}}</td>
  <td>{{c.position}}</td>
</tr>
</tbody>
</table>

<script>

var comp_list_app = angular.module('competitorListApp', []);
comp_list_app.controller('competitorListCtrl', function($scope, $http) {
	$scope.getRaceDetails = function() {
		url = "race_manager.php?race_id=<?php echo $_GET['race_id'];?>";
		$http.get(url).then(function(response) {
			$scope.raceDetails = response.data;
		});
	}

	$scope.getRaceDetails();

});

</script>
</html>
