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
		$w = strlen($header);
		foreach ($data as $item) {
			if ($w < strlen($item)) {
				$w = strlen($item);
			}
		}
		$w = $w * 3;
		// Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// Header
		$this->Cell($w,7,$header,1,0,'C',true);
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = false;
		foreach($data as $row)
		{
			$this->Cell($w,6,$row,'LR',0,'L',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		// Closing line
		$this->Cell($w,0,'','T');
	}
	
	function createHeader($str_header){
		 // Arial bold 15
		$this->SetFont('Arial','B',15);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(strlen($str_header)*4,10, $str_header,1,0,'C');
		// Line break
		$this->Ln(20);
	}
	
	function createDetails($arr_details){
		
	}
}