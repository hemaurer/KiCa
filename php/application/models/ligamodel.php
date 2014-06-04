<?php

class LigaModel
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


    public function get_ligatabelle($s_id)
    {

        $sql = "SELECT mannschaft.name AS Team, 
				(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id or spiel.auswaerts = mannschaft.m_id) and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = :s_id and spiel.h_tore IS NOT NULL and spiel.a_tore IS NOT NULL) AS Spiele,
				(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id and spiel.h_tore > spiel.a_tore or  spiel.auswaerts = mannschaft.m_id and spiel.h_tore < spiel.a_tore) and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = :s_id) AS S,
				(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id or spiel.auswaerts = mannschaft.m_id) and spiel.h_tore = spiel.a_tore and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = :s_id) AS U,
				(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id and spiel.h_tore < spiel.a_tore or  spiel.auswaerts = mannschaft.m_id and spiel.h_tore > spiel.a_tore) and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = :s_id) AS N,
				(SELECT COUNT(*)*3 FROM spiel WHERE (spiel.heim = mannschaft.m_id and spiel.h_tore > spiel.a_tore or  spiel.auswaerts = mannschaft.m_id and spiel.h_tore < spiel.a_tore) and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = :s_id) + 
					(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id or spiel.auswaerts = mannschaft.m_id) and spiel.h_tore = spiel.a_tore and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = :s_id) AS Punkte,
				CONCAT((SELECT IFNULL(SUM(spiel.h_tore),0) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = :s_id) +  (SELECT IFNULL(SUM(spiel.a_tore),0) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = :s_id),':', 
					(SELECT IFNULL(SUM(spiel.h_tore),0) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = :s_id) +  (SELECT IFNULL(SUM(spiel.a_tore),0) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = :s_id)) AS Tore,
				(SELECT IFNULL(SUM(spiel.h_tore),0) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = :s_id) +  (SELECT IFNULL(SUM(spiel.a_tore),0) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = :s_id) -
					((SELECT IFNULL(SUM(spiel.h_tore),0) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = :s_id) + (SELECT IFNULL(SUM(spiel.a_tore),0) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = :s_id)) AS TD
				FROM mannschaft
					JOIN mannschaft_turnier_sparte ON mannschaft.m_id = mannschaft_turnier_sparte.m_id
				WHERE mannschaft_turnier_sparte.tu_id = 1 and mannschaft_turnier_sparte.sparte_id = :s_id
				ORDER BY Punkte DESC,
							TD DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array(':s_id' => $s_id));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();

    }

}?>