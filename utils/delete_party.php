<?php
include "connection.php";

$id = $_POST['id'];
$is_bill = $_POST['is_bill'];
$sql = "DELETE from bill_account WHERE id=$id";
$result = $conn->query($sql);
if($conn->affected_rows >0){
	if($is_bill == "1"){
		$r = $conn->query("DELETE from bill_account WHERE bill_id = $id");

	}
	echo "Success";
}else{
	echo "Error";
}
$conn->close();
?>