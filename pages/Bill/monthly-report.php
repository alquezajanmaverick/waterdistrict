<?php include ("../../connection/PHPpdo.php");
if(session_status()== PHP_SESSION_NONE)
{
	session_start();
}
if(!isset($_SESSION['user']))
{
	header("Location:../../");
}
if($_SESSION['privilege'] != 'Bill'){
	header("Location:../../");
}
//-----------------------------------------------

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Water District Billing and Collection</title>
<link rel="import" href="../import.html">
</head>
<body>
<div class="container-fluid">
	<div class="row" style="height:100vh;">
		<div class="col-md-2 bg-inverse">
        <br><br><br>
        	<ul class="list-group">
              <a href="index.php"><li class="list-group-item"><h4>Prepare Bill</h4></li></a>
              <a href="issue-bill.php"><li class="list-group-item"><h4>Issue Billing Receipt</h4></li></a>
              <a href="billing-report.php"><li class="list-group-item"><h4>Daily Billing Report</h4></li></a>
              <a href="monthly-report.php"><li class="list-group-item active disabled"><h4>Month-End Billing Report</h4></li></a>
              <a href="../../logout.php"><li class="list-group-item"><h4>Logout</h4></li></a>
            </ul>
        </div>
		<div class="col-md-10 bg-primary"></div>
	</div>
</div>
</body>
</html>