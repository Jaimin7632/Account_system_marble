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
	$p_type = $conn->query("SELECT DISTINCT product_type from stock where product='$product'");
	
	while($pt= $p_type->fetch_assoc()){
		$product_type = $pt['product_type'];

		$sql2 = "SELECT * from stock where product='$product' AND product_type='$product_type'";
		if($date1 !="" && $date2 !=""){$sql2.=" AND date BETWEEN '$date1' AND '$date2'";}

		$d= $conn->query($sql2." ORDER BY date asc");
		$amount =0;
		$details = array();
		while($row_data= $d->fetch_assoc()){
			// echo $row_data['product_type'];
			if($row_data['add_minus'] == 0){
				$amount += $row_data['amount'];
			}else{
				$amount -= $row_data['amount'];
			}
			$details[] = $row_data;
			$pt['date'] = $row_data['date'];

			$pt['product'] = $row_data['product'];
			$pt['id'] = $row_data['id'];
		}
		$pt['amount'] = $amount;
		$pt['details'] = $details;
		$result['stock'][] = $pt;
	}
	
}


echo json_encode($result);


?>