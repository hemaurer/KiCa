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

/* 
    public function get_turniertabelle($sparte_id, $tu_id)
    {

        $sql = "SELECT * FROM turnier";
        $query = $this->db->prepare($sql);
        $query->execute(array($sparte_id, $tu_id));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();

    } */
	
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

}?>