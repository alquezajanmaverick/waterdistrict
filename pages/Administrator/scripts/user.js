var app = angular.module('userApp',[]);

app.controller('userCtrl',function($scope,$http){
	$scope.updateForm = {};
	$http.get("services/get-user.php")
	.then(function(response){
		$scope.users = response.data;
	});
	
	$scope.viewDetails = function(w,x,y,z){
		$scope.updateForm.fullname = w;
		$scope.updateForm.username = x;
		$scope.updateForm.password = y;
		$scope.updateForm.privilege = z;
	};
});