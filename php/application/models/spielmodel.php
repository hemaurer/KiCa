<?php

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
	
	function get_Spiel($id){
		// Suche Spiel mit bestimmter ID
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
	
	function get_Aufstellung($id){
		// Suche die bisherige Aufstellung für ein bestimmtes Spiel
		$sql = "SELECT CONCAT (person.v_name,' ', person.name) AS Spieler, aufstellung.p_id AS PersonID
			FROM aufstellung
			JOIN person On person.p_id = aufstellung.p_id
			WHERE aufstellung.s_id = ".$id;
		$query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
	}
	
	function set_Aufstellung($id, $arr_aufgestellteSpieler){
		// Neue Aufstellung speichern für ein bestimmtes Spiel
		
		// Zuerst alte Aufstellung löschen
		$sql = "DELETE FROM aufstellung
			WHERE aufstellung.s_id = ".$id;
		$query = $this->db->prepare($sql);
        $query->execute();
		
		// Neue Aufstellung speichern
		foreach ($arr_aufgestellteSpieler as $i_spieler){
			$sql = "INSERT INTO aufstellung values (".$id.", ".$i_spieler.")";
			$query = $this->db->prepare($sql);
			$query->execute();
		}
	}
}?>