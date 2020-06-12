<?php
include('fpdf182/fpdf182.php');

$data = $_POST['data'];
$y = json_decode($data,true);



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

#Print_date
$date = "Date: ".date("d/m/Y");
$pdf->Cell(20,10,$date);
$pdf->ln();


$ignore_list = array('comment','bill_id','details','is_bill','pay_receive');
$keys = array_keys($y[0]);
foreach($keys as $key){
	if(in_array(strtolower($key), $ignore_list)){
		continue;
	}
	$pdf->Cell(24,10,$key,'LRTB','C');
	// print_r($key);
}

$pdf->ln();
$pdf->SetFont('Arial','',8);

foreach ($y as $key => $value) {
	foreach ($value as $key2 => $value2) {
		if(in_array(strtolower($key2), $ignore_list)){
			continue;
		}
		$pdf->Cell(24,7,$value2,'LRTB','C');
	}
	$pdf->ln();
}

	$pdf->ln();
	$pdf->ln();
	if(isset($_POST['footer_data'])){
		$pdf->Cell(24,7,$_POST['footer_data']);
	}


$pdf->output();

?>