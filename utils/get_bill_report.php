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

$sql=$conn->query("SELECT * FROM bill_account where ".$add." ORDER BY date desc");
while($r = $sql->fetch_assoc()){
	$bill_id= $r['id'];
	$total_amount = 0;
	if($r['pay_receive']==1){
		$total_amount = $r['amount'];
	}else{
		$total_amount = -$r['amount'];
	}

	$bill_query = $conn->query("SELECT * FROM bill_account where bill_id=$bill_id");
	$details = array();
	while($bill_details = $bill_query -> fetch_assoc()){
		if($bill_details['pay_receive']==1){
			$total_amount -= $bill_details['amount'];
		}else{
			$total_amount += $bill_details['amount'];
		}
		$details[] = $bill_details;
	}
	$r['details'] = $details;
	$r['effective_amount'] = $total_amount;
	$result['bills'][]= $r;
}

########

// $add=" AND is_bill=0";
// if($pname !="" && $is_bill!=""){
// 	$add.=" AND party_name='$pname' AND bill_no=$bill_no";
// 	$bill_query = $conn->query("SELECT * FROM bill_account where party_name='$pname' AND $bill_no=$bill_no AND is_bill=1");
// 	$bill_details = $bill_query->fetch_assoc();
// 	if($bill_details['pay_receive']==0){
// 		$result['var']['amount'] = $bill_details['amount'];
// 	}else{
// 		$result['var']['amount'] = - $bill_details['amount'];
// 	}
// }
// if($date1 !="" && $date2 !=""){$add.=" AND date BETWEEN '$date1' AND '$date2'";}

// $sql=$conn->query("SELECT * FROM bill_account where 1".$add." ORDER BY date desc");

// $total_amount = 0
// while($r= mysqli_fetch_assoc($sql))
// {
// 	$result['pay'][]=$r;
// 	$sell_quantity += $r['quantity'];
// }

// $sql=$conn->query("SELECT * FROM purchase_detail where productname='$product'".$add." ORDER BY date desc");

// $purchase_quantity=0;
// while($r= mysqli_fetch_assoc($sql))
// {
// 	$result['purchase'][]=$r;
// 	$purchase_quantity+=$r['quantity'];
// }
// $result['qua']["sell"] =$sell_quantity;
// $result['qua']["purchase"]=$purchase_quantity;
echo json_encode($result);


?>