<?php
include "connection.php";
$product = $_GET['name'];

$sql=$conn->query("SELECT * from stock where product='$product'");
$result=array();

while($r= mysqli_fetch_assoc($sql))
{
	$result[]=$r;
	
}
$conn->close();
echo json_encode($result);
?>