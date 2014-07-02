<?php
require('application/libs/fpdf/fpdf.php');
// Beispiel von http://www.fpdf.org/en/tutorial/tuto5.htm
class PDF extends FPDF {

	// Colored table
	function FancyTable($header, $data)
	{
		// Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// Header
		$w = array(40, 35, 40, 45);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = false;
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
			$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
			$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}
	
	function ShowList($header, $data){
		// Größte Zelle ermitteln
		$w = strlen($header[0]);
		foreach ($data as $item) {
			if ($w < strlen($item)) {
				$w = strlen($item);
			}
		}
		$w = $w * 3 + 5;
		// Colors, line width and bold font
		$this->SetFillColor(181,181,181);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// Header
		foreach($header as $item){			
			$this->Cell($w,7,$item,0,0,'C',true);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		foreach($data as $row)
		{
			$this->Cell($w,6,$row,0,0,'L');
			$this->Cell($w/2-3);
			$this->Cell($w,6,$this->Image("public/img/square.png"), 0, 0 ,'R');
			$this->Ln();
		}
	}
	
	function createHeader($str_header){
		// Add Logo
		$this->Image("public/img/football-icon.png", 10, 6, 30);
		 // Arial bold 25
		$this->SetFont('Arial','B',25);
		// Move to the right
		$this->Cell(35);
		$this->Write(25,"KiCa");
		$this->Ln(20);
	
		 // Arial bold 15
		$this->SetFont('Arial','B',15);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Write(10, $str_header);
		// Line break
		$this->Ln(20);
	}
	
	function createDetails($arr_details){
		
	}
}