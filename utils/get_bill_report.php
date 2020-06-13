<?php
include "connection.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
 
 $pname = $request->pname;
 $bill_no = $request->bill_no;
 $date1 = $request->date1;
 $date2 = $request->date2;
 $pay_receive= $request->bill_type;

$result=array();
$add="1 AND is_bill=1";
if($pname !="" && $bill_no!=""){
	$add.=" AND party_name='$pname' AND bill_no=$bill_no";
}
if($date1 !="" && $date2 !=""){$add.=" AND date BETWEEN '$date1' AND '$date2'";}
if($pay_receive != "") { $add .= " AND pay_receive=$pay_receive";}

$sql=$conn->query("SELECT * FROM bill_account where ".$add." ORDER BY date asc");
while($r = $sql->fetch_assoc()){
	$bill_id= $r['id'];
	$total_amount = 0;
	

	$bill_query = $conn->query("SELECT * FROM bill_account where bill_id=$bill_id");
	$details = array();
	$details[] = $r;
	$details[0]['pay_receive'] = 10+$r['pay_receive'];
	while($bill_details = $bill_query -> fetch_assoc()){
		// if($r['pay_receive'] != $bill_details['pay_receive']){
		// 	$r['amount'] += $bill_details['amount'];

		// }

		if($bill_details['pay_receive']==1){   # 0 - Add, 1- Less
			$total_amount += $bill_details['amount'];
		}else{
			// $total_amount += $bill_details['amount'];
			$r['amount'] += $bill_details['amount'];
		}
		$details[] = $bill_details;
	}


	if($r['pay_receive']==1){ # 0 - vendor , 1 - customer
		$total_amount = $r['amount'] - $total_amount;
	}else{
		$total_amount = -$r['amount'] + $total_amount;
	}

	$r['details'] = $details;
	$r['effective_amount'] = $total_amount;
	$result['bills'][]= $r;
}


echo json_encode($result);


?>