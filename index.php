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
  <td><a href='competitor_listing.php?race_id={{r.id}}'>{{r.closing_time | date: 'dd/MM/yy hh:mm:ss'}}</a></td>
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

	$scope.countDown = function () {
		var now = new Date().getTime();
		var reloadList = false;
		angular.forEach($scope.raceList, function(value, key) {
			var close_time = new Date.createFromMysql(value.closing_time);
			var distance = close_time.getTime() - now;
			if (distance <= 1000) {
				reloadList = true;
				value.countdown_time = "BETTING CLOSED";
			}
			else {
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				value.countdown_time = days + " days " + hours + " hours " + minutes + " minutes " + seconds + " seconds";
			}
		});
		if (reloadList) {
			$scope.getNext5();
		}
	}

	$scope.getNext5();
	$interval($scope.countDown, 1000);

});

Date.createFromMysql = function(mysql_string)
{ 
   var t, result = null;

   if( typeof mysql_string === 'string' )
   {
      t = mysql_string.split(/[- :]/);

      //when t[3], t[4] and t[5] are missing they defaults to zero
      result = new Date(t[0], t[1] - 1, t[2], t[3] || 0, t[4] || 0, t[5] || 0);          
   }

   return result;   
}

</script>
</html>
