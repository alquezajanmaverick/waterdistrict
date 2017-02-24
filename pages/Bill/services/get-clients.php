<?php include ("../../../connection/PHPpdo.php");
$db = new DatabaseConnect();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$db->query("SELECT c.AcctNo,CONCAT(c.Fname,' ',c.Lname,', ',c.NameEx) as 'FullName',ZoneNum,(SELECT SUM(Reading) from tblbillingrecord WHERE AcctNo = c.AcctNo) as 'Prev' from tblclient as c;
");
$x = $db->resultset();

$js = json_encode($x);

echo $js;
	
	

?>