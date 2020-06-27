<?php
include "connection.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
 
 $date1 = $request->date1;
 $date2 = $request->date2;


$result=array();
$add="1 ";

if($date1 !="" && $date2 !=""){$add.=" AND date BETWEEN '$date1' AND '$date2'";}

$sql=$conn->query("SELECT * FROM daily_expenditure where ".$add." ORDER BY date asc");
while($r = $sql->fetch_assoc()){
	
	$result['daily_exp'][]= $r;
}


echo json_encode($result);
$conn->close();

?>