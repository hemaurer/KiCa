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


    public function get_turniertabelle($s_id, $tu_id)
    {

        $sql = "SELECT * FROM turnier";
        $query = $this->db->prepare($sql);
        $query->execute(array($s_id, $tu_id));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();

    }

}?>