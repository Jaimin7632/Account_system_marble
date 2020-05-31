<?php
include 'connection.php';

$date = $_POST['date'];
$party_name = $_POST['party_name'];
$bill_no = $_POST['bill_no'];
$book_no = $_POST['book_no'];
$mobile_no = $_POST['mobile_no'];
$comment = $_POST['comment'];
$pay_receive = $_POST['pay_receive'];
$amount = $_POST['amount'];


$sql = "INSERT INTO bill_account(date, party_name, bill_no, book_no, mobile_no, comment, pay_receive, amount) VALUES ('$date','$party_name', '$bill_no', '$book_no', '$mobile_no', '$comment', $pay_receive, $amount)";
if($conn->query($sql)){
	echo "Data added"; 
}else{
	echo "error";
}	


$conn->close();
?>