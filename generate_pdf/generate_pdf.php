<?php
include('mc_table.php');

$data = $_POST['data'];
$y = json_decode($data,true);



$pdf=new PDF_MC_Table();
$pdf->AddPage();

$pdf->SetFont('Arial','B',8);
$cell_width = 24;

#Print_date
$date = "Date: ".date("d/m/Y");
$pdf->Cell($cell_width,10,$date);
$pdf->ln();

if(isset($_POST['header_data'])){
	$pdf->Cell($cell_width,7,$_POST['header_data']);
	$pdf->ln();
	$pdf->ln();
}

$ignore_list = array('comment','bill_id','details','is_bill','pay_receive','id','add_minus');



$keys = array_keys($y[0]);

$pdf->Cell($cell_width,10,'#','LRTB','C');
foreach($keys as $key){
	if(in_array(strtolower($key), $ignore_list)){
		continue;
	}
	$pdf->Cell($cell_width,10,$key,'LRTB','C');
	// print_r($key);
}

$pdf->ln();
$pdf->SetFont('Arial','',8);


$id = 1;
foreach ($y as $key => $value) {
	$row = array();
	$width=array();
	$row[] = $id++;
	$width[] = $cell_width;
	foreach ($value as $key2 => $value2) {
		if(in_array(strtolower($key2), $ignore_list)){
			continue;
		}

		$row[] = $value2;
		$width[] = $cell_width;
		// $pdf->Cell(24,7,$value2,'LRTB','C');
	}
	$pdf->SetWidths($width);
	$pdf->Row($row);
	// $pdf->ln();
}

$pdf->ln();

	$pdf->ln();
	$pdf->ln();
	if(isset($_POST['footer_data'])){
		$pdf->Cell($cell_width,7,$_POST['footer_data']);
	}


$pdf->output();

?>