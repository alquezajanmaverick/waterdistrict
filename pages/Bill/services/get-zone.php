<?php include ("../../../connection/PHPpdo.php");
$db = new DatabaseConnect();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$db->query("SELECT distinct(ZoneNum) from tblclient");
$x = $db->resultset();

$js = json_encode($x);

echo $js;
	
	

?>