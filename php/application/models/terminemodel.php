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
                JOIN person ON trainingseinheit.trainer = person.p_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();

    }


}?>