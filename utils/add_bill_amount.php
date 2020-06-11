<?php
include 'connection.php';
$id = $_POST['id'];
$date = $_POST['date'];
$comment = $_POST['comment'];
$amount= $_POST['amount'];
$pay_receive = $_POST['pay_receive'];

$row = $conn->query("SELECT * FROM bill_account WHERE id=$id and is_bill=1");

$result  = $row -> fetch_assoc();
$party_name = $result['party_name'];
$bill_no = $result['bill_no'];
$book_no = $result['book_no'];
$mobile_no = $result['mobile_no'];

$sql = "INSERT INTO bill_account(date, party_name, bill_no, book_no, mobile_no, comment, pay_receive, amount, is_bill,bill_id) VALUES ('$date','$party_name', '$bill_no', '$book_no', '$mobile_no', '$comment', $pay_receive, $amount, 0,$id)";
if($conn->query($sql)){
	echo "Data added"; 
}else{
	echo "error";
}	


$conn->close();
?>