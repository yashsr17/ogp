<?php 
session_start();
$issue = $_SESSION['issue'];
$dated = $_SESSION['dated'];
$dated1 = $_SESSION['dated1'];
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Cell(0,10,"",0,0,'C');
$pdf->Image("./img/gov-of-india.png",70,10,70,'C');
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->SetFont('Arial','B',32);
$pdf->Cell(0,10,"Invoice",1,1,'C');
$pdf->SetFont('Arial','B',32);
$pdf->Cell(0,10,"",0,1,'');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'');
$pdf->Cell(0,10,"Invoice number : ".$dated1,0,0,'C');
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"              Dated                             :         ".$dated,0,0,'');
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,0,'C');
$pdf->Image("./img/signature.png",80,230,70,'C');
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"Authorized Signature",0,0,'C');
$pdf->Cell(0,10,"",0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"(Government of India)",0,0,'C');
$pdf->output();
?>