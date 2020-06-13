<?php
include 'connection.php';

$date = $_POST['date'];
$product = $_POST['product'];
$add_minus = $_POST['add_minus'];
$product_type = $_POST['product_type'];
$amount = $_POST['amount'];
$is_new = $_POST['is_new'];

$sql = "INSERT INTO stock(date, product, product_type, add_minus, amount, is_new) VALUES ('$date','$product', '$product_type', $add_minus, $amount, $is_new)";
// echo $sql;
if($conn->query($sql)){
	echo "Data added"; 
}else{
	echo "error";
}	


$conn->close();
?>