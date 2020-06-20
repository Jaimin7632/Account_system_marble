<?php
include 'connection.php';

$id = $_POST['id'];
$date = $_POST['date'];
$party_name = $_POST['party_name'];
$bill_no = $_POST['bill_no'];
$book_no = $_POST['book_no'];
$mobile_no = $_POST['mobile_no'];
$comment = $_POST['comment'];
$pay_receive = $_POST['pay_receive'];
$amount = $_POST['amount'];


$sql = "UPDATE bill_account SET date='$date', party_name= '$party_name', bill_no='$bill_no', book_no='$book_no', mobile_no='$mobile_no', comment='$comment', pay_receive=$pay_receive, amount=$amount WHERE id=$id";

if($conn->query($sql)){
	echo "Data added"; 
}else{
	echo "error";
}	


$conn->close();
?>