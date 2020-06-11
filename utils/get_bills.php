<?php
include "connection.php";
$sql = "SELECT * FROM `bill_account` WHERE is_bill=1";

if(isset($_GET['party_name'])){
	$party_name = $_GET['party_name'];
	$sql.= " AND party_name='$party_name'";
}
$sql=$conn->query($sql);
$result=array();

while($r= mysqli_fetch_assoc($sql))
{
	$result[]=$r;
	
}
$conn->close();
echo json_encode($result);
?>