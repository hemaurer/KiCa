<?php
require('application/libs/fpdf/fpdf.php');
// Beispiel abgewandelt von http://www.fpdf.org/en/tutorial/tuto5.htm
class PDF extends FPDF {

	// Erstelle eine Liste mitsamt grauer Kopfzeile
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
		$this->SetFillColor(191,191,191);
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
	// Erstelle den Header mit Logo und  einem Titel
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
	// Erstelle Tabelle ohne Ränder mit den Details eines Trainings
	function createTrainingDetails($arr_details){
		$date = new DateTime($arr_details->Uhrzeit); // Datumsformatierer vorbereiten
		$this->SetFont('Arial','',12);
		$this->Cell(35,5,"Details",0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Name",0,0,'L');
		$this->Cell(50,6,utf8_decode($arr_details->Name),0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Ort",0,0,'L');
		$this->Cell(50,6,utf8_decode($arr_details->Ort),0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Zeit",0,0,'L');
		$this->Cell(50,6,utf8_decode($date->format('H:i'))." Uhr",0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Datum",0,0,'L');
		$this->Cell(50,6,utf8_decode($date->format('d.m.Y')),0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Trainingsgruppe",0,0,'L');
		$this->Cell(50,6,utf8_decode($arr_details->Trainingsgruppe),0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Trainer",0,0,'L');
		$this->Cell(50,6,utf8_decode($arr_details->Trainer),0,0,'L');
		$this->Ln(15);
	}
	// Erstelle Tabelle ohne Ränder mit den Details eines Spiels
	function createSpielDetails($arr_details){
		$date = new DateTime($arr_details->Uhrzeit); // Datumsformatierer vorbereiten
		$this->SetFont('Arial','',12);
		$this->Cell(35,5,"Details",0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Heimteam",0,0,'L');
		$this->Cell(50,6,utf8_decode($arr_details->Heim),0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,utf8_decode("Auswärtsteam"),0,0,'L');
		$this->Cell(50,6,utf8_decode($arr_details->Auswaerts),0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Ergebnis",0,0,'L');
		if ($arr_details->Heimtore != null ) {
			$this->Cell(50,6,utf8_decode($arr_details->Heimtore.":".$arr_details->Auswaertstore),0,0,'L');
		} else {
			$this->Cell(50,6,"",0,0,'L');
		}
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Spielart",0,0,'L');
		$this->Cell(50,6,utf8_decode($arr_details->Turnier),0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Ort",0,0,'L');
		$this->Cell(50,6,utf8_decode($arr_details->Ort),0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Zeit",0,0,'L');
		$this->Cell(50,6,utf8_decode($date->format('H:i'))." Uhr",0,0,'L');
		$this->Ln(5);
		$this->Cell(35);
		$this->Cell(35,6,"Datum",0,0,'L');
		$this->Cell(50,6,utf8_decode($date->format('d.m.Y')),0,0,'L');
		$this->Ln(15);
	}
}