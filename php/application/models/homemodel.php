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

//****************************************
//*KALENDER MIT DATEN AUS DER DB BEFÜLLEN*
//****************************************

    //Trainingsdaten ausgeben
    public function getTrainingseinheitenDaten()
    {
        //Als Array festlegen
        $json = array();

        $sql = "SELECT CONCAT('\\n',name) AS title, zeit AS start, tr_id AS ID FROM trainingseinheit";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return json_encode($query->fetchAll());
    }//end getTrainingseinheitenDaten()


    //Ligaspiele ausgeben
    public function getLigaDaten($sparte_id)
    {
        $json = array();

        $sql = "SELECT IF(spiel.heim=1,CONCAT(' (H)','\\n',auswaerts.name),CONCAT(' (A)','\\n',heim.name)) AS title, spiel.zeit AS start, spiel.s_id AS ID
                FROM spiel
                 JOIN mannschaft AS heim ON heim.m_id=spiel.heim
                 JOIN mannschaft AS auswaerts ON auswaerts.m_id=spiel.auswaerts
                WHERE (spiel.heim = 1 OR spiel.auswaerts = 1) AND spiel.stat_id = 1 AND spiel.sparte_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($sparte_id));

        return json_encode($query->fetchAll());
    }//end getLigaDaten()


    //Freundschaftsspiele ausgeben
    public function getFreundschaftsDaten($sparte_id)
    {
        $json = array();

        $sql = "SELECT IF(spiel.heim=1,CONCAT(' (H)','\\n',auswaerts.name),CONCAT(' (A)','\\n',heim.name)) AS title, spiel.zeit AS start, spiel.s_id AS ID
                FROM spiel
                 JOIN mannschaft AS heim ON heim.m_id=spiel.heim
                 JOIN mannschaft AS auswaerts ON auswaerts.m_id=spiel.auswaerts
                WHERE (spiel.heim = 1 OR spiel.auswaerts = 1) AND spiel.stat_id = 7 AND spiel.sparte_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($sparte_id));

        return json_encode($query->fetchAll());
    }//end getFreundschaftsDaten()


    //Turnierspiele ausgeben
    public function getTurnierDaten($sparte_id)
    {
        $json = array();

        $sql = "SELECT IF(spiel.heim=1,CONCAT(' (H)','\\n',auswaerts.name),CONCAT(' (A)','\\n',heim.name)) AS title, spiel.zeit AS start, spiel.s_id AS ID
                FROM spiel
                 JOIN mannschaft AS heim ON heim.m_id=spiel.heim
                 JOIN mannschaft AS auswaerts ON auswaerts.m_id=spiel.auswaerts
                WHERE (spiel.heim = 1 OR spiel.auswaerts = 1) AND (stat_id <> 1 AND stat_id <> 7) AND spiel.sparte_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($sparte_id));

        return json_encode($query->fetchAll());
    }//end getTurnierDaten()

//***********************************
//*DETAILS FÜR KALENDER MODALS LADEN*
//***********************************

    //Kalender Details nach dem Klick auf einen Trainings Eintrag im Home-Kalendar laden
    public function getKalenderDetails_training($id)
    {
        $json = array();

        $sql = "SELECT trainingseinheit.name as Name, trainingseinheit.ort as Ort, trainingseinheit.zeit as Uhrzeit, trainingsgruppe.name as Trainingsgruppe, CONCAT (person.name, ', ', person.v_name ) as Trainer
                FROM trainingseinheit
                JOIN trainingsgruppe ON trainingseinheit.tg_id = trainingsgruppe.tg_id
                JOIN person ON trainingseinheit.trainer = person.p_id WHERE tr_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($id));

        //Ergebnis als JSON formatieren
        $result = json_encode($query->fetchAll());
        //Das erste und letzte Zeichen des Strings entfernen, dass es interpretiert werden kann
        $json_string = substr($result, 1 , (strlen($result)-2));

        echo $json_string;
        return $json_string;
    }//end getKalenderDetails_training()

    //Kalender Details nach dem Klick auf einen Spiel Eintrag im Home-Kalendar laden
    public function getKalenderDetails_spiel($id)
    {
        $json = array();

        $sql = "SELECT spiel.s_id, spiel.ort as Ort, heim.name as Heim, auswaerts.name as Auswaerts, spiel.h_tore as Heimtore, spiel.a_tore as Auswaertstore, `status`.`status` as Status, spiel.zeit as Uhrzeit, turnier.name as Turnier , sparte.name AS Sparte
                FROM spiel
                JOIN mannschaft as heim ON spiel.heim = heim.m_id
                JOIN mannschaft as auswaerts ON spiel.auswaerts = auswaerts.m_id
                JOIN `status` ON spiel.stat_id =`status`.stat_id
                JOIN turnier ON spiel.tu_id = turnier.tu_id
                JOIN sparte ON spiel.sparte_id = sparte.sparte_id WHERE spiel.s_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($id));

        //Ergebnis als JSON formatieren
        $result = json_encode($query->fetchAll());
        //Das erste und letzte Zeichen des Strings entfernen, dass es interpretiert werden kann
        $json_string = substr($result, 1 , (strlen($result)-2));

        echo $json_string;
        return $json_string;
    }//end getKalenderDetails_spiel()

}?>
