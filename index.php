<?php include ("connection/PHPpdo.php");

if(session_status()== PHP_SESSION_NONE)
{
	session_start();
}
if(isset($_SESSION['user']))
{
	session_destroy();
}
if(isset($_POST['username']))
{
	$db = new DatabaseConnect();
	$db->query("SELECT * from tbluser WHERE username = ? AND password = ?");
	$db->bind(1,$_POST['username']);
	$db->bind(2,$_POST['password']);
	$x = $db->single();
	$r = $db->rowCount();
	if($r >0)
	{
		$_SESSION['user']=$x['username'];
		$_SESSION['privilege'] = $x['privilege'];
		if($x['privilege']=='Bill')
		{
			header("Location:pages/Bill/");
		}
		elseif($x['privilege']=='Admin'){
			header("Location:pages/Administrator/");
		}
		
	}
		
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Water District Billing and Collection</title>
<link rel="import" href="import.html">
</head>
<body>
<div class="container-fluid" style="background-color:#075784;height: 100vh;">
	<div class="row">
    	<div class="col-md-8 push-md-2" style="margin-top:100px;">
        <br>
        <br>
        	<h1 class="text-center text-white">Water District Billing and Collection System</h1>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
	</div>
	<div class="row">
  		<div class="col-md-12">
        	<div class="row">
            	
                <div class="col-md-6 push-md-3">
                	<div class="card">
                		<div class="card-block">
                        	<h1 class="card-title">LOGIN</h1>
                            <form method="post" name="xform" id="xform">
                                <div class="input-group mb-2">
                                	<div class="input-group-addon">USERNAME</div>
                                    <input type="text" name="username" id="username" class="form-control form-control-lg" required>
                                </div>
                                <div class="input-group mb-2">
                                	<div class="input-group-addon">PASSWORD</div>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" required>
                                </div>
                                <center><button type="submit" class="btn btn-primary btn-lg">LOGIN</button></center>
                            </form>
						</div>
                	</div>
                </div>
            </div>
        </div>
	</div>
</div>
</body>
</html>