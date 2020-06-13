<?php
include "connection.php";
$product = $_GET['name'];

$sql=$conn->query("SELECT DISTINCT product_type from stock where product='$product'");
$result=array();

while($r= mysqli_fetch_assoc($sql))
{
	$result[]=$r;
	
}
$conn->close();
echo json_encode($result);
?>