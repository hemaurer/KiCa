<?php

class SpartenModel
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


    //Liest die Sparten aus der DB aus
    //genutzt z.B. in der Navigation und Home
	public function getSparten()
	{
        $sql = "SELECT sparte.sparte_id AS ID, sparte.name As Sparte From sparte";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();

    } //end getSparten()


    //Liest die zugehörigen Turniere zu der ausgewählten Sparte aus der DB
    //genutzt in Turniere
    public function getTurniere($sparte_id)
    {
        $sql = "SELECT turnier.name AS Turnier, turnier.tu_id AS ID
                FROM turnier
                JOIN turnier_sparte ON turnier_sparte.tu_id = turnier.tu_id
                WHERE turnier.liga = 0 AND turnier_sparte.sparte_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($sparte_id));

        return $query->fetchAll();

    } //end getTurniere()


}?>