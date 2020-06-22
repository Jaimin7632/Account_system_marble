<?php
include "connection.php";

$id = $_POST['id'];
$product = $_POST['product'];
$product_type = $_POST['product_type'];
$all = $_POST['all'];


if($all== "1"){
	$sql = "DELETE from stock where product='$product' AND product_type='$product_type'";
}else{
	$sql ="DELETE from stock where id=$id";
}
$result = $conn->query($sql);
if($result){
	echo "Success";
}else{
	echo "Error";
}

$conn->close();
?>