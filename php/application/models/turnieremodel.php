<?php

class TurniereModel
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
	// Alle Spiele zu einem bestimmten Turnier einer bestimmten Sparte (bspw. DFB-Pokal der B-Jugend) ermitteln
	public function get_turnierSpiele($sparte_id, $tu_id){
		$sql = "SELECT spiel.s_id AS SpielID, heim.name AS Heim, auswaerts.name AS Auswaerts, spiel.h_tore AS Heimtore, spiel.a_tore AS Auswaertstore, `status`.`status` AS Status
			FROM spiel
			JOIN `status` ON `status`.stat_id=spiel.stat_id
			JOIN mannschaft AS heim ON heim.m_id =spiel.heim
			JOIN mannschaft AS auswaerts ON auswaerts.m_id = spiel.auswaerts
			WHERE spiel.tu_id =? and spiel.sparte_id= ?
			ORDER BY spiel.zeit";
		$query = $this->db->prepare($sql);
        $query->execute(array($tu_id, $sparte_id));
		return $query->fetchAll();
	}
	
	public function get_winner($sparte_id, $tu_id){
		$sql = "SELECT mannschaft.name
			FROM mannschaft
			JOIN turnier_sparte ON turnier_sparte.gewinner = mannschaft.m_id
			WHERE turnier_sparte.tu_id =? and turnier_sparte.sparte_id= ?";
		$query = $this->db->prepare($sql);
        $query->execute(array($tu_id, $sparte_id));
		$result = $query->fetchAll();
		if (count($result) > 0){ 
			$str_winner = $result[0]->name;
		} else {
			$str_winner = null;
		}
		return $str_winner;
	}

}?>