<?php

class TermineModel
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


    public function get_alle_spiele()
    {

        $sql = "SELECT spiel.s_id, spiel.ort as Ort, heim.name as Heim, auswaerts.name as Auswaerts, spiel.h_tore as Heimtore, spiel.a_tore as Auswaertstore, `status`.`status` as Status, spiel.zeit as Uhrzeit, turnier.name as Turnier , sparte.name AS Sparte
                FROM spiel
                    JOIN mannschaft as heim ON spiel.heim = heim.m_id
                    JOIN mannschaft as auswaerts ON spiel.auswaerts = auswaerts.m_id
                    JOIN `status` ON spiel.stat_id =`status`.stat_id
                    JOIN turnier ON spiel.tu_id = turnier.tu_id
                    JOIN sparte ON spiel.sparte_id = sparte.sparte_id
					WHERE CONVERT(spiel.zeit,DATE)>= DATE_ADD(CURRENT_DATE(),INTERVAL -7 DAY)
                ORDER BY Uhrzeit ASC";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();

    }


    public function get_alle_trainingseinheiten()
    {

         $sql = "SELECT trainingseinheit.tr_id, trainingseinheit.name as Name, trainingseinheit.ort as Ort, trainingseinheit.zeit as Uhrzeit, trainingsgruppe.name as Trainingsgruppe, CONCAT (person.name, ', ', person.v_name ) as Trainer
                FROM trainingseinheit
                JOIN trainingsgruppe ON trainingseinheit.tg_id = trainingsgruppe.tg_id
                JOIN person ON trainingseinheit.trainer = person.p_id
				WHERE CONVERT(trainingseinheit.zeit,DATE)>= DATE_ADD(CURRENT_DATE(),INTERVAL -7 DAY)
				ORDER BY Uhrzeit ASC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();

    }
	// Baue ein zweidimensionales Array für Termine an jedem Tag
	public function bau_terminplan()
    {
		// Hole alle relevanten Spiele und Trainingseinheiten
		$spiele = $this->get_alle_spiele();
		$trainings = $this->get_alle_trainingseinheiten();
		// Alle Zaehlvariablen initialisieren
		$zaehlerSpiele = 0;
		$zaehlerTrainings = 0;
		$terminplan = array();
		$zaehlerTag = 0;	
		$zaehlerTermine = 0;
		$dateCounter = 0;
		if (count($spiele < 1) || count($trainings) < 1) {
			// Mindestens eine Kategorie nicht vorhanden
			if (count($trainings) < 1 && count($spiele) < 1) {
				// Kein Termin vorhanden, also nichts machen
			} else if (count($trainings) < 1) {
				// Kein Training vorhanden, daher nur die Spieleliste einfügen
				foreach ($spiele as $spiel){
					if ($dateCounter != substr($spiel->Uhrzeit, 0, 10)) {
						$zaehlerTag++;
						$zaehlerTermine = 0;
						$dateCounter = substr($spiel->Uhrzeit, 0, 10);
					}
					$terminplan[$zaehlerTag][$zaehlerTermine] = $spiel;
				}
			} else {
				// Kein Spiel vorhanden, daher nur die Trainingsliste einfügen
				foreach ($trainings as $training){
					if ($dateCounter != substr($training->Uhrzeit, 0, 10)) {
						$zaehlerTag++;
						$zaehlerTermine = 0;
						$dateCounter = substr($training->Uhrzeit, 0, 10);
					}
					$terminplan[$zaehlerTag][$zaehlerTermine] = $training;
				}
			}
		} else {
			// 
			if ($spiele[0]->Uhrzeit < $trainings[0]->Uhrzeit){
				$dateCounter = substr($spiele[0]->Uhrzeit, 0, 10);
			} else {
				$dateCounter = substr($trainings[0]->Uhrzeit, 0, 10);
			}
			while ($zaehlerSpiele < count($spiele) || $zaehlerTrainings < count($trainings)){
				if ($zaehlerSpiele >= count($spiele)) {
					if ($dateCounter != substr($trainings[$zaehlerTrainings]->Uhrzeit, 0, 10)) {
						$zaehlerTag++;
						$zaehlerTermine = 0;
						$dateCounter = substr($trainings[$zaehlerTrainings]->Uhrzeit, 0, 10);
					}
					$terminplan[$zaehlerTag][$zaehlerTermine] = $trainings[$zaehlerTrainings];
					$zaehlerTrainings++;
					$zaehlerTermine++;
				} else if ($zaehlerTrainings >= count($trainings)){
					if ($dateCounter != substr($spiele[$zaehlerSpiele]->Uhrzeit, 0, 10)) {
						$zaehlerTag++;
						$zaehlerTermine = 0;
						$dateCounter = substr($spiele[$zaehlerSpiele]->Uhrzeit, 0, 10);
					}
					$terminplan[$zaehlerTag][$zaehlerTermine] = $spiele[$zaehlerSpiele];
					$zaehlerSpiele++;
					$zaehlerTermine++;
				} else {
					if ($spiele[$zaehlerSpiele]->Uhrzeit < $trainings[$zaehlerTrainings]->Uhrzeit){
						if ($dateCounter != substr($trainings[$zaehlerTrainings]->Uhrzeit, 0, 10)) {
							$zaehlerTag++;
							$zaehlerTermine = 0;
							$dateCounter = substr($trainings[$zaehlerTrainings]->Uhrzeit, 0, 10);
						}
						$terminplan[$zaehlerTag][$zaehlerTermine] = $spiele[$zaehlerSpiele];
						$zaehlerSpiele++;
						$zaehlerTermine++;
					} else {
						if ($dateCounter != substr($trainings[$zaehlerTrainings]->Uhrzeit, 0, 10)) {
							$zaehlerTag++;
							$zaehlerTermine = 0;
							$dateCounter = substr($spiele[$zaehlerSpiele]->Uhrzeit, 0, 10);
						}
						$terminplan[$zaehlerTag][$zaehlerTermine] = $trainings[$zaehlerTrainings];
						$zaehlerTrainings++;	
						$zaehlerTermine++;
					}
				}
			}
		}
        return $terminplan;
    }

}?>