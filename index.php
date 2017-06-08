<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Next 5</title>
	<link rel="stylesheet" type="text/css" href="/styles/styles.css"/>
<script type="text/javascript" src="/scripts/k9_lib.js"></script>
<script>

</script>
    </head>
<div class="container-fluid">

<form ng-app='raceApp' ng-controller='raceCtrl'>  
<h3>Next 5 Races</h3>
<br>
<table>
<thead>
  <th>Meeting</th>
  <th>Race Type</th>
  <th>Closing Time</th>
  <th>Time left to place bet</th>
</thead>
<tr ng-repeat='r in raceList'>
  <td>{{r.meeting.name}}</td>
  <td>{{r.race_type.name}}</td>
  <td><a href='competitor_listing.php?race_id={{r.id}}'>{{r.closing_time}}</a></td>
  <td>{{r.countdown_time}}</td>
</tr>
</table>
<script>

var race_app = angular.module('raceApp', []);
race_app.controller('raceCtrl', function($scope, $interval, $http) {
	$scope.getNext5 = function() {
		url = "race_manager.php";
		$http.get(url).then(function(response) {
			$scope.raceList = response.data;
		});
	}

	$scope.getNext5();
	$interval($scope.getNext5, 1000);

});

</script>
</html>
