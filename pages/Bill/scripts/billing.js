var app = angular.module('billApp',[]);

app.controller('billCtrl',function($scope,$http){
	$http.get("services/get-zone.php")
	.then(function(response){
		$scope.zone = response.data;
	});
	
	$http.get("services/get-clients.php")
	.then(function(response){
		$scope.clients = response.data;
	});
});