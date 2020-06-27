<?php
include "connection.php";

$id = $_POST['id'];

$sql = "DELETE from daily_expenditure where id=$id";
$result = $conn->query($sql);
if($result){
	echo "Success";
}else{
	echo "Error";
}

$conn->close();
?>