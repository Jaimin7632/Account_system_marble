<?php
include 'connection.php';

$date = $_POST['date'];
$comment = $_POST['comment'];
$add_minus = $_POST['add_minus'];
$amount = $_POST['amount'];


$sql = "INSERT INTO daily_expenditure(date,  comment, add_minus, amount) VALUES ('$date','$comment','$add_minus',$amount)";
if($conn->query($sql)){
	echo "Data added"; 
}else{
	echo "error";
}	


$conn->close();
?>