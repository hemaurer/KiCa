<?php
require('application/libs/pdf.php');
class SpielModel
{

    function __construct($db) {
        try
		{
            $this->db = $db;
        }
		catch (PDOException $e)
		{
            exit('Database connection could not be established.');
        }
    }
	// Suche Spiel mit bestimmter ID
	function get_Spiel($id){
        $sql = "SELECT spiel.s_id, spiel.ort as Ort, heim.name as Heim, auswaerts.name as Auswaerts, spiel.h_tore as Heimtore, spiel.a_tore as Auswaertstore, `status`.`status` as Status, spiel.zeit as Uhrzeit, turnier.name as Turnier , sparte.name AS Sparte
			FROM spiel 
				JOIN mannschaft as heim ON spiel.heim = heim.m_id
				JOIN mannschaft as auswaerts ON spiel.auswaerts = auswaerts.m_id
				JOIN `status` ON spiel.stat_id =`status`.stat_id
				JOIN turnier ON spiel.tu_id = turnier.tu_id
				JOIN sparte ON spiel.sparte_id = sparte.sparte_id
			WHERE spiel.s_id = ".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
	}
	// Suche die bisherige Aufstellung für ein bestimmtes Spiel
	function get_Aufstellung($id){
		$sql = "SELECT CONCAT (person.v_name,' ', person.name) AS Spieler, aufstellung.p_id AS PersonID
			FROM aufstellung
			JOIN person On person.p_id = aufstellung.p_id
			WHERE aufstellung.s_id = ".$id;
		$query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
	}
	// Neue Aufstellung speichern für ein bestimmtes Spiel
	function set_Aufstellung($id, $arr_aufgestellteSpieler){
		// Zuerst alte Aufstellung löschen
		$sql = "DELETE FROM aufstellung
			WHERE aufstellung.s_id = ".$id;
		$query = $this->db->prepare($sql);
        $query->execute();
		
		// Neue Aufstellung speichern
		$sql = "INSERT INTO aufstellung (s_id, p_id) values (".$id.", ".$arr_aufgestellteSpieler[0].")";
		if (count($arr_aufgestellteSpieler) > 1 ) {
			for ($i = 1; $i < count($arr_aufgestellteSpieler); $i++){
				$sql = $sql.", (".$id.", ".$arr_aufgestellteSpieler[$i].")";
			}
		}			
		$query = $this->db->prepare($sql);
		$query->execute();
	}
	
	// Erstelle eine PDF mit Details zum Spiel und der Aufstellung
	function create_PDF($s_id){
		
		$pdf = new PDF();
		// Column headings
		$str_header = 'Name';
		// Data loading
		$arr_anwesend = $this->get_Aufstellung($s_id);
		$arr_data = array();
		foreach ($arr_anwesend as $item){
			array_push($arr_data, $item->Spieler);
		}
		$pdf->SetFont('Arial','',14);
		$pdf->AddPage();
		$pdf->createHeader("Aufstellung");
		$pdf->createSpielDetails($this->get_Spiel($s_id));
		if (count($arr_anwesend) > 0) {
			$arr_header = array (0 => "Name", 1 => "anwesend?");
		$pdf->ShowList($arr_header,$arr_data);
		}
		$pdf->Output();
	}
	
}?>