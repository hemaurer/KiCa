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


    public function get_ligatabelle()
    {

        $sql = "SELECT mannschaft.name AS Team,
                (SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id or spiel.auswaerts = mannschaft.m_id) and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1 and spiel.h_tore IS NOT NULL and spiel.a_tore IS NOT NULL) AS Spiele,
                (SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id and spiel.h_tore > spiel.a_tore or  spiel.auswaerts = mannschaft.m_id and spiel.h_tore < spiel.a_tore) and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) AS S,
                (SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id or spiel.auswaerts = mannschaft.m_id) and spiel.h_tore = spiel.a_tore and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) AS U,
                (SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id and spiel.h_tore < spiel.a_tore or  spiel.auswaerts = mannschaft.m_id and spiel.h_tore > spiel.a_tore) and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) AS N,
                (SELECT COUNT(*)*3 FROM spiel WHERE (spiel.heim = mannschaft.m_id and spiel.h_tore > spiel.a_tore or  spiel.auswaerts = mannschaft.m_id and spiel.h_tore < spiel.a_tore) and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) +
                (SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id or spiel.auswaerts = mannschaft.m_id) and spiel.h_tore = spiel.a_tore and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) AS Punkte,
                CONCAT((SELECT SUM(spiel.h_tore) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) +  (SELECT SUM(spiel.a_tore) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1),':',
                (SELECT SUM(spiel.h_tore) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) +  (SELECT SUM(spiel.a_tore) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1)) AS Tore,
                (SELECT SUM(spiel.h_tore) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) +  (SELECT SUM(spiel.a_tore) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) -
                ((SELECT SUM(spiel.h_tore) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) + (SELECT SUM(spiel.a_tore) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1)) AS TD
                FROM mannschaft
                JOIN mannschaft_turnier_sparte ON mannschaft.m_id = mannschaft_turnier_sparte.m_id
                WHERE mannschaft_turnier_sparte.tu_id = 1 and mannschaft_turnier_sparte.sparte_id = 1
                ORDER BY Punkte DESC,
                            TD DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();

    }

}?>