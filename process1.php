<?php 

if (!empty($_POST['submit'])) {
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];

require('fpdf.php');

// A4 width : 219mm


$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

// set font to arial bold 14pt

$pdf-> SetFont('Arial','B','14');

$pdf->Cell(100 ,5,'ISTEAMS CO. LTD',0,0);

$pdf->Cell(100 ,10,'',0,0);

$pdf->Cell(0,10,'Welcome {$fname}',0,1);

$pdf->Cell(50 ,10,'Name :',1,0);
$pdf->Cell(90 ,10,$lname,1,1);


$pdf->Cell(50 ,10,'Name :',1,0);
$pdf->Cell(90 ,10,$fname,1,1);

$pdf->Cell(50 ,10,'Gender :',1,0);
$pdf->Cell(90 ,10,$gender,1,1);

$pdf->Cell(50 ,10,'dob:',1,0);
$pdf->Cell(90 ,10,$dob,1,1);

$pdf->Cell(50 ,10,'mobile :',1,0);
$pdf->Cell(90 ,10,$mobile,1,1);

$pdf->Cell(50 ,10,'email :',1,0);
$pdf->Cell(90 ,10,$email,1,1);

$pdf->output();
}



 ?>