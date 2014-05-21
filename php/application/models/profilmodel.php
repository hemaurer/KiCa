<?php

class ProfilModel
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


    public function doChangeProfilbild($p_id)
    {

        //Dateiendung für die Umbennenung herausfiltern
        $filename = basename($_FILES['userfile']['name']);
        $filenameext = pathinfo($filename, PATHINFO_EXTENSION);

        //Verzeichnis zur Ablage des hochgeladenen Bildes setzen
        $uploaddir = './public/img/profilbilder/';
        //Namen des Bildes definieren
        $uploadfile = $uploaddir . $p_id . "_profilbild." . $filenameext;
        $str_bild = "." . $uploaddir . $p_id . "_profilbild." . $filenameext;

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
        } else {
            echo "Datei konnte nicht hochgeladen werden.\n";
        }

        //Den Pfad zum hochgeladenen Bild in der DB der Person eintragen, dass es angezeigt wird
        $sql = "UPDATE person SET bild=? WHERE p_id=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($str_bild,$p_id));

        $_SESSION['bild'] = $str_bild;

        //Infos fürs Debugging:
            // echo '<pre>';
            // print_r($_FILES);
            // print "</pre>";
    }//end doChangeProfilbild()


    public function doChangeGroesse($p_id, $int_groesse)
    {
        $sql = "UPDATE person SET groesse=? WHERE p_id=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($int_groesse,$p_id));

        $_SESSION['groesse'] = $int_groesse;
    }//end doChangeGroesse()


    public function doChangeTel($p_id, $str_tel)
    {
        $sql = "UPDATE person SET tel=? WHERE p_id=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($str_tel,$p_id));

        $_SESSION['tel'] = $str_tel;
    }//end doChangeTel()


    public function doChangePassword($p_id, $str_password)
    {
        //noch zu implementieren
        // $sql = "UPDATE person SET password=? WHERE p_id=?";
        // $query = $this->db->prepare($sql);
        // $query->execute(array($str_password,$p_id));
    }//end doChangeTel()


    public function getTrainingsdaten($p_id)
    {
        $sql = "SELECT trainingsgruppe.name FROM trainingsgruppe RIGHT JOIN teilnehmer_tg ON trainingsgruppe.tg_id = teilnehmer_tg.tg_id WHERE teilnehmer_tg.p_id = (SELECT person.p_id FROM person WHERE person.p_id=?)";
        $query = $this->db->prepare($sql);
        $query->execute(array($p_id));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }//end getTrainingsdaten()
}?>