<?php
require('fpdf.php');

// A4 width : 219mm
// echo "Today is " . date("Y/m/d") . "<br>";
// echo "Today is " . date("Y.m.d") . "<br>";
// echo "Today is " . date("Y-m-d") . "<br>";
// echo "Today is " . date("l");

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

// set font to arial bold 14pt

$pdf-> SetFont('Arial','B','14');

// cell (width, height, text, border, end line, alline)

$pdf->Cell(130 ,5,'Innovation Streams Limited',0,0);
$pdf->Cell(59 ,5,'Invoice',0,1);//END OF LINE

// set font to arial regular 12pt

$pdf-> SetFont('Arial','','12'); 

$pdf->Cell(130 ,5,'[Address]',0,0);
$pdf->Cell(59 ,5,'',0,1);//END OF LINE

$pdf->Cell(130 ,5,'[Mbarara, Uganda]',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,date("d-m-Y"),0,1);//END OF LINE

$pdf->Cell(130 ,5,'Phone [+256704899935]',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//END OF LINE

$pdf->Cell(130 ,5,'Tel [+256783763778]',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,'[1234]',0,1);//END OF LINE


//make a dummy empty cell as vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to:',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Company Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Address]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Phone]',0,1);

//make a dummy empty cell as vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf-> SetFont('Arial','B','12');

$pdf->Cell(130 ,5,'Description',1,0);
$pdf->Cell(25 ,5,'Taxable',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//END OF LINE

$pdf-> SetFont('Arial','','12');

//Numbers are right-aligned so we give R after new line parameter 
$pdf->Cell(130 ,5,'Computer',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,200000',1,1,'R');//END OF LINE

$pdf->Cell(130 ,5,'Hard disk',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'250,000',1,1,'R');//END OF LINE

$pdf->Cell(130 ,5,'Something Else',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'200,000',1,1,'R');//END OF LINE

//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(10 ,5,'Ugx',1,0);
$pdf->Cell(24 ,5,'430,000',1,1,'R');//END OF LINE

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(10 ,5,'Ugx',1,0);
$pdf->Cell(24 ,5,'0',1,1,'R');//END OF LINE

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(10 ,5,'Ugx',1,0);
$pdf->Cell(24 ,5,'10%',1,1,'R');//END OF LINE

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Grand total',0,0);
$pdf->Cell(10 ,5,'Ugx',1,0);
$pdf->Cell(24 ,5,'2,000,000',1,1,'R');//END OF LINE

$pdf->OutPut();
?>