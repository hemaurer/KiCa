<?php
require('application/libs/pdf.php');
class TrainingModel
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
	// Suche Training mit bestimmter ID
	function get_Training($id){
        $sql = "SELECT trainingseinheit.tr_id as tr_id, trainingseinheit.name as Name, trainingseinheit.ort as Ort, trainingseinheit.zeit as Uhrzeit, trainingsgruppe.name as Trainingsgruppe, CONCAT (person.name, ', ', person.v_name ) as Trainer 
			FROM trainingseinheit
			JOIN trainingsgruppe ON trainingseinheit.tg_id = trainingsgruppe.tg_id
			JOIN person ON trainingseinheit.trainer = person.p_id
			WHERE trainingseinheit.tr_id = ".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
	}
	// Suche alle Personen, die anwesend sein müssen
	function get_Anwesenheitsliste($tr_id){
		$sql = "SELECT CONCAT(person.v_name, ' ', person.name) AS Teilnehmer, person.p_id
			FROM person
			JOIN teilnehmer_tg ON teilnehmer_tg.p_id = person.p_id
			JOIN trainingseinheit ON teilnehmer_tg.tg_id = trainingseinheit.tg_id
			WHERE trainingseinheit.tr_id = ".$tr_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
	}
	// Suche alle Personen, die nicht anwesend sind
	function get_Abwesenheitsliste($tr_id){
		$sql = "SELECT CONCAT(person.v_name, ' ', person.name) AS Teilnehmer, person.p_id
			FROM person
			JOIN abwesenheit ON abwesenheit.p_id = person.p_id
			WHERE abwesenheit.tr_id = ".$tr_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
	}
	// Speichere neue Abwesenheitsliste
	function set_Abwesenheitsliste($tr_id, $arr_p_ids){
		// Zunächst alle, die anwesend sein müssen, als abwesend eintragen
		$anwesenheitsliste = $this->get_Anwesenheitsliste($tr_id);
		for ($i = 0; $i < count($anwesenheitsliste); $i++){
			$sql = "INSERT IGNORE INTO abwesenheit
			VALUES (?, ?)";
			$query = $this->db->prepare($sql);
			$query->execute(array($tr_id, $anwesenheitsliste[$i]->p_id));
		}
		// Alle abgehakten Spieler aus der Abwesenheitsliste löschen
		for ($i = 0; $i < count($arr_p_ids); $i++){
			$sql = "DELETE FROM abwesenheit
			WHERE abwesenheit.tr_id = ? AND abwesenheit.p_id = ?";
			$query = $this->db->prepare($sql);
			$query->execute(array($tr_id, $arr_p_ids[$i]));
		}
	}
	// Erstelle eine PDF  mit Details zum Training und einer Anwesenheitsliste
	function create_PDF($tr_id){
		$pdf = new PDF();
		// Column headings
		$str_header = 'Name';
		// Data loading
		$arr_anwesend = $this->get_Anwesenheitsliste($tr_id);
		$arr_data = array();
		foreach ($arr_anwesend as $item){
			array_push($arr_data, $item->Teilnehmer);
		}
		$pdf->SetFont('Arial','',14);
		$pdf->AddPage();
		$pdf->createHeader("Anwesenheitsliste");
		$pdf->createTrainingDetails($this->get_Training($tr_id));
		$arr_header = array (0 => "Name", 1 => "anwesend?");
		$pdf->ShowList($arr_header,$arr_data);
		$pdf->Output();
	}
}
?>