<?php
include 'connection.php';

$id = $_POST['id'];
$date = $_POST['date'];
$product = $_POST['product'];
$add_minus = $_POST['add_minus'];
$product_type = $_POST['product_type'];
$amount = $_POST['amount'];


$sql =" UPDATE stock SET date='$date', product='$product', product_type='$product_type', add_minus=$add_minus, amount=$amount WHERE id=$id";

// $sql = "INSERT INTO stock(date, product, product_type, add_minus, amount) VALUES ('$date','$product', '$product_type', $add_minus, $amount)";
// echo $sql;
if($conn->query($sql)){
	echo "Data added"; 
}else{
	echo "Error";
}	


$conn->close();
?>