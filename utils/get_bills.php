<?php
include "connection.php";

$id = $_GET['id'];
$is_bill  = $_GET['is_bill'];
$sql = "SELECT * FROM `bill_account` where 1";
if($is_bill != ""){ $sql .= " AND is_bill=$is_bill";}
if($id != ""){ $sql .= " AND id=$id";}

$sql.= " ORDER BY date ASC";
// echo $sql;
$sql=$conn->query($sql);
$result=array();

while($r= mysqli_fetch_assoc($sql))
{
	$result[]=$r;
	
}
$conn->close();
echo json_encode($result);
?>