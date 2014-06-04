<?php

class HomeModel
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

    //Trainingsdaten ausgeben
    public function getTrainingseinheitenDaten()
    {
        $json = array();

        $sql = "SELECT name AS title, zeit AS start FROM trainingseinheit";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return json_encode($query->fetchAll());
    }//end getKalendarDaten()


    //Ligaspiele ausgeben
    public function getLigaDaten()
    {
        $json = array();

        $sql = "SELECT ort AS title, zeit AS start FROM spiel WHERE (heim = 1 OR auswaerts = 1) AND stat_id = 1";
        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetchAll());
    }//end getKalendarDaten()


    //Freundschaftsspiele ausgeben
    public function getFreundschaftsDaten()
    {
        $json = array();

        $sql = "SELECT ort AS title, zeit AS start FROM spiel WHERE (heim = 1 OR auswaerts = 1) AND stat_id = 7";
        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetchAll());
    }//end getKalendarDaten()

    //Turnierspiele ausgeben
    public function getTurnierDaten()
    {
        $json = array();

        $sql = "SELECT ort AS title, zeit AS start FROM spiel WHERE (heim = 1 OR auswaerts = 1) AND (stat_id <> 1 AND stat_id <> 7)";
        $query = $this->db->prepare($sql);
        $query->execute();

        return json_encode($query->fetchAll());
    }//end getKalendarDaten()
}?>