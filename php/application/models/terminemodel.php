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
		// Suche alle Spiele, beginnend vor einer Woche 
        $sql = "SELECT spiel.s_id, spiel.ort as Ort, heim.name as Heim, auswaerts.name as Auswaerts, spiel.h_tore as Heimtore, spiel.a_tore as Auswaertstore, `status`.`status` as Status, spiel.zeit as Uhrzeit, turnier.name as Turnier , sparte.name AS Sparte
                FROM spiel
                    JOIN mannschaft as heim ON spiel.heim = heim.m_id
                    JOIN mannschaft as auswaerts ON spiel.auswaerts = auswaerts.m_id
                    JOIN `status` ON spiel.stat_id =`status`.stat_id
                    JOIN turnier ON spiel.tu_id = turnier.tu_id
                    JOIN sparte ON spiel.sparte_id = sparte.sparte_id
					WHERE CONVERT(spiel.zeit,DATE)>= DATE_ADD(CURRENT_DATE(),INTERVAL -7 DAY) AND (heim.m_id = 1 OR auswaerts.m_id = 1)
                ORDER BY Uhrzeit ASC";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();

    }

    public function get_alle_trainingseinheiten()
    {
		// Suche alle Trainings, beginnend vor einer Woche 
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
		// Hole alle relevanten ar_spiele und ar_trainingseinheiten
		$ar_spiele = $this->get_alle_spiele();
		$ar_trainings = $this->get_alle_trainingseinheiten();
		// Alle Zaehlvariablen initialisieren
		$i_zaehlerSpiele = 0;
		$i_zaehlerTrainings = 0;
		$ar_terminplan = array();
		$i_zaehlerTag = 0;	
		$i_zaehlerTermine = 0;
		$d_zeigerDatum = 0;
		
		if ((count($ar_spiele) < 1) || (count($ar_trainings) < 1)) {
			// Mindestens eine Kategorie nicht vorhanden
			if ((count($ar_trainings) < 1) && (count($ar_spiele) < 1)) {
				// Kein Termin vorhanden, also nichts machen
			} else if (count($ar_trainings) < 1) {
				// Kein Training vorhanden, daher nur die Spieleliste einfügen
				foreach ($ar_spiele as $spiel){
					if ($d_zeigerDatum != substr($spiel->Uhrzeit, 0, 10)) {
						$i_zaehlerTag++;
						$i_zaehlerTermine = 0;
						$d_zeigerDatum = substr($spiel->Uhrzeit, 0, 10);
					}
					$ar_terminplan[$i_zaehlerTag][$i_zaehlerTermine] = $spiel;
				}
			} else {
				// Kein Spiel vorhanden, daher nur die Trainingsliste einfügen
				foreach ($ar_trainings as $training){
					if ($d_zeigerDatum != substr($training->Uhrzeit, 0, 10)) {
						$i_zaehlerTag++;
						$i_zaehlerTermine = 0;
						$d_zeigerDatum = substr($training->Uhrzeit, 0, 10);
					}
					$ar_terminplan[$i_zaehlerTag][$i_zaehlerTermine] = $training;
				}
			}
		} else {
			// Alle Spiele und Trainingseinheiten laden
			
			// Frühsten Termin ermitteln, um das Datum somit die erste Dimension zu bestimmen
			if ($ar_spiele[0]->Uhrzeit < $ar_trainings[0]->Uhrzeit){
				$d_zeigerDatum = substr($ar_spiele[0]->Uhrzeit, 0, 10);
			} else {
				$d_zeigerDatum = substr($ar_trainings[0]->Uhrzeit, 0, 10);
			}
			// Solange noch Spiele oder Trainingseinheiten vorhanden sind, fülle die Liste
			while ($i_zaehlerSpiele < count($ar_spiele) || $i_zaehlerTrainings < count($ar_trainings)){
				if ($i_zaehlerSpiele >= count($ar_spiele)) {
					// Es sind keine weiteren Spiele da, daher nur noch Termine beachten
					if ($d_zeigerDatum != substr($ar_trainings[$i_zaehlerTrainings]->Uhrzeit, 0, 10)) {
						// Prüfen, ob ein neuer Tag ist
						$i_zaehlerTag++;
						$i_zaehlerTermine = 0;
						$d_zeigerDatum = substr($ar_trainings[$i_zaehlerTrainings]->Uhrzeit, 0, 10);
					}
					// Termin hinzufügen und Zähler erhöhen
					$ar_terminplan[$i_zaehlerTag][$i_zaehlerTermine] = $ar_trainings[$i_zaehlerTrainings];
					$i_zaehlerTrainings++;
					$i_zaehlerTermine++;
				} else if ($i_zaehlerTrainings >= count($ar_trainings)){
					// Es sind keine weiteren Trainings vorhanden, daher nur noch Spiele hinzufügen
					if ($d_zeigerDatum != substr($ar_spiele[$i_zaehlerSpiele]->Uhrzeit, 0, 10)) {
						$i_zaehlerTag++;
						$i_zaehlerTermine = 0;
						$d_zeigerDatum = substr($ar_spiele[$i_zaehlerSpiele]->Uhrzeit, 0, 10);
					}
					// Spiel hinzufügen und Zähler erhöhen
					$ar_terminplan[$i_zaehlerTag][$i_zaehlerTermine] = $ar_spiele[$i_zaehlerSpiele];
					$i_zaehlerSpiele++;
					$i_zaehlerTermine++;
				} else {
					// Training und Spiel noch vorhanden, eins muss hinzugefügt werden
					if ($ar_spiele[$i_zaehlerSpiele]->Uhrzeit < $ar_trainings[$i_zaehlerTrainings]->Uhrzeit){
						// Das Spiel ist vor dem Training, daher das zuerst einfügen
						if ($d_zeigerDatum != substr($ar_spiele[$i_zaehlerSpiele]->Uhrzeit, 0, 10)) {
							$i_zaehlerTag++;
							$i_zaehlerTermine = 0;
							$d_zeigerDatum = substr($ar_spiele[$i_zaehlerSpiele]->Uhrzeit, 0, 10);
						}
						// Spiel hinzufügen und Zähler erhöhen
						$ar_terminplan[$i_zaehlerTag][$i_zaehlerTermine] = $ar_spiele[$i_zaehlerSpiele];
						$i_zaehlerSpiele++;
						$i_zaehlerTermine++;
					} else {
						// Das Training ist vor dem Spiel, daher das zuerst einfügen
						if ($d_zeigerDatum != substr($ar_trainings[$i_zaehlerTrainings]->Uhrzeit, 0, 10)) {
							$i_zaehlerTag++;
							$i_zaehlerTermine = 0;
							$d_zeigerDatum = substr($ar_trainings[$i_zaehlerTrainings]->Uhrzeit, 0, 10);
						}
						// Termin hinzufügen und Zähler erhöhen
						$ar_terminplan[$i_zaehlerTag][$i_zaehlerTermine] = $ar_trainings[$i_zaehlerTrainings];
						$i_zaehlerTrainings++;	
						$i_zaehlerTermine++;
					}
				}
			}
		}
        return $ar_terminplan;
    }
}?>