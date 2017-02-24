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
</head>

<body>
<div class="container-fluid">
	<div class="row" style="height:100vh;">
		<div class="col-md-2 bg-inverse">
        <br><br><br>
        	<ul class="list-group">
              <a href="#"><li class="list-group-item active disabled"><h4>Zone</h4></li></a>
              <a href="user.php"><li class="list-group-item"><h4>User</h4></li></a>
              <a href="concessionaire.php"><li class="list-group-item"><h4>Concessionaire</h4></li></a>
              <a href="../../logout.php"><li class="list-group-item"><h4>Logout</h4></li></a>
            </ul>
        </div>
		<div class="col-md-10 bg-success" ng-app="billApp" ng-controller="billCtrl">
       		<div class="container-fluid"><br>
       			
       		</div>
        </div>
	</div>
</div>
</body>
</html>