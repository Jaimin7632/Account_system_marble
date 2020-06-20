<?php
include "connection.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
 
 $product = $request->product;
 $date1 = $request->date1;
 $date2 = $request->date2;

// $product="";
// $date1= "";
// $date2= "";

$result=array();
$add=" 1";
if($product !=""){
	$add.=" AND product='$product'";
}
if($date1 !="" && $date2 !=""){$add.=" AND date BETWEEN '$date1' AND '$date2'";}


$sql=$conn->query("SELECT DISTINCT product FROM stock where ".$add);
// echo "SELECT * FROM stock where ".$add;
while($r = $sql->fetch_assoc()){

	$product = $r['product'];
	$p_type = $conn->query("SELECT DISTINCT product_type,product,id from stock where product='$product'");
	
	while($pt= $p_type->fetch_assoc()){
		$product_type = $pt['product_type'];
		$d= $conn->query("SELECT * from stock where ".$add." AND product_type='$product_type' ORDER BY date asc");
		#echo "SELECT * from stock where ".$add." AND product_type='$product_type' ORDER BY date asc";
		$amount =0;
		$details = array();
		while($row_data= $d->fetch_assoc()){
			if($row_data['add_minus'] == 0){
				$amount += $row_data['amount'];
			}else{
				$amount -= $row_data['amount'];
			}
			$details[] = $row_data;
			$pt['date'] = $row_data['date'];
		}
		$pt['amount'] = $amount;
		$pt['details'] = $details;
		$result['stock'][] = $pt;
	}
	
}


echo json_encode($result);


?>