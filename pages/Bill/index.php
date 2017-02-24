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
<script src="scripts/billing.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="row" style="height:100vh;">
		<div class="col-md-2 bg-inverse">
        <br><br><br>
        	<ul class="list-group">
              <a href="#"><li class="list-group-item active disabled"><h4>Prepare Bill</h4></li></a>
              <a href="issue-bill.php"><li class="list-group-item"><h4>Issue Billing Receipt</h4></li></a>
              <a href="billing-report.php"><li class="list-group-item"><h4>Daily Billing Report</h4></li></a>
              <a href="monthly-report.php"><li class="list-group-item"><h4>Month-End Billing Report</h4></li></a>
              <a href="../../logout.php"><li class="list-group-item"><h4>Logout</h4></li></a>
            </ul>
        </div>
		<div class="col-md-10 bg-primary" ng-app="billApp" ng-controller="billCtrl">
       		<div class="container-fluid"><br>
       			<div class="row">
                <div class="col-md-12">
                	<div class="row">
                    	<div class="col-md-4">
                            <div class="card">
                            <div class="card-block">
                                <h2 class="card-title">Filter by Zone:</h2>
                                <select class="form-control form-control-lg" ng-model="xZone">
                                    <option ng-repeat="z in zone">{{z.ZoneNum}}</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-block">
                                    <div class="input-group mb-2">
                                	<div class="input-group-addon">Search</div>
                                    <input type="text" name="username" id="username" class="form-control form-control-lg" ng-model="xsearch" >
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                	<div class="row">
                        <div class="col-md-12">
                        	<div class="card">
                                <div class="card-block">
                                   <div class="col-md-12" style="overflow-y:scroll;height:500px;">
                                   	<table class="table table-condensed table-sm">
                                        <thead class="bg-inverse text-white">
											<td><center>Account No.</center></td>
											<td><center>Name</center></td>
											<td><center>Zone</center></td>
											<td><center>Previous Reading</center></td>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="x in clients | filter:xZone | filter:xsearch">
												<td><center>{{x.AcctNo}}</center></td>
												<td><center>{{x.FullName}}</center></td>
												<td><center>{{x.ZoneNum}}</center></td>
												<td><center>{{x.Reading}}</center></td>
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
        </div>
	</div>
</div>
</body>
</html>