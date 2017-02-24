<?php include ("../../connection/PHPpdo.php");
if(session_status()== PHP_SESSION_NONE)
{
	session_start();
}
if(!isset($_SESSION['user']))
{
	header("Location:../../");
}
if($_SESSION['privilege'] != 'Admin'){
	header("Location:../../");
}
//-----------------------------------------------

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator</title>
<link rel="import" href="../import.html">
<script src="scripts/user.js"></script>
</head>

<body>
<div class="container-fluid">
	<div class="row" style="height:100vh;">
		<div class="col-md-2 bg-inverse">
        <br><br><br>
        	<ul class="list-group">
              <a href="index.php"><li class="list-group-item"><h4>Zone</h4></li></a>
              <a href="#"><li class="list-group-item active disabled"><h4>User</h4></li></a>
              <a href="concessionaire.php"><li class="list-group-item"><h4>Concessionaire</h4></li></a>
              <a href="../../logout.php"><li class="list-group-item"><h4>Logout</h4></li></a>
            </ul>
        </div>
		<div class="col-md-10 bg-success" ng-app="userApp" ng-controller="userCtrl" style="overflow-y: scroll;height: 100vh;">
       		<div class="container-fluid"><br>
       			<div class="row">
       				<div class="col-md-12">
						<div class="card">
							<div class="card-block">
								<h3 class="card-title">Add User:</h3>
							</div>
						</div>
					</div>	
       			</div>
       			<br>
       			<div class="row">
       				<div class="col-md-12">
						<div class="card">
							<div class="card-block">
								<h3 class="card-title">Update User:</h3>
								<form>
									<div class="row">
										<div class="col">
											<div class="input-group">
											  <span class="input-group-addon" id="basic-addon1">FullName:</span>
											  <input type="text" ng-model="updateForm.fullname" class="form-control" aria-describedby="basic-addon1">
											</div>
										</div>
										<div class="col">
											<div class="input-group">
											  <span class="input-group-addon" id="basic-addon1">Username:</span>
											  <input type="text" ng-model="updateForm.username" class="form-control" aria-describedby="basic-addon1">
											</div>
										</div>
										<div class="col">
											<div class="input-group">
											  <span class="input-group-addon" id="basic-addon1">Password:</span>
											  <input type="password" ng-model="updateForm.password" class="form-control" aria-describedby="basic-addon1">
											</div>
										</div>
										<div class="col">
											<div class="input-group">
											  <span class="input-group-addon" id="basic-addon1">Privilege:</span>
											  <input type="text" class="form-control" ng-model="updateForm.privilege" aria-describedby="basic-addon1">
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-12" ng-if="updateForm.username != null">
											<center>
												<button class="btn btn-primary col-md-12">SUBMIT</button>
											</center>
										</div>
									</div>

									</form>
							</div>
						</div>
					</div>	
       			</div>
       			<br>
       			<div class="row">
       				<div class="col-md-12">
						<div class="card">
							<div class="card-block">
								<h3 class="card-title">List of Users:</h3>
								<table class="table table-condensed">
									<thead class="bg-inverse text-white">
										<td><center>Full Name</center></td>
										<td><center>Username</center></td>
										<td><center>Privilege</center></td>
									</thead>
									<tbody>
										<tr ng-repeat="user in users" ng-click="viewDetails(user.fullname,user.username,user.password,user.privilege)">
											<td><center>{{user.fullname}}</center></td>
											<td><center>{{user.username}}</center></td>
											<td><center>{{user.privilege}}</center></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>	
       			</div>
       		</div>
        </div>
	</div>
</div>
</body>
</html>