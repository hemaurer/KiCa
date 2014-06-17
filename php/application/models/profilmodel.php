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
        $uploaddir = 'public/img/profilbilder/';
        //Namen des Bildes definieren
        $uploadfile = "./" .$uploaddir . $p_id . "_profilbild." . $filenameext;
        $str_bild = $uploaddir . $p_id . "_profilbild." . $filenameext;

        //Bild hochladen
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            //bereits vorhandes Bild löschen
            if ($_SESSION['bild'] != "../public/img/profilbilder/_noimage.jpg"){
                unlink(substr($_SESSION['bild'],3));
            }
            // echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
        } else {
            // echo "Datei konnte nicht hochgeladen werden.\n";
        }

        //Den Pfad zum hochgeladenen Bild in der DB der Person eintragen, dass es angezeigt wird
        $sql = "UPDATE person SET bild=? WHERE p_id=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($str_bild,$p_id));

        //Session Variable neu setzen, dass das neue Bild auf der Profilseite angezeigt wird
        $_SESSION['bild'] = $str_bild;

        //Zusätzliche Infos fürs Debugging:
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

            echo true;

    }//end doChangeGroesse()


    public function doChangeTel($p_id, $str_tel)
    {
        $sql = "UPDATE person SET tel=? WHERE p_id=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($str_tel,$p_id));

        $_SESSION['tel'] = $str_tel;

        echo true;
    }//end doChangeTel()


    public function doChangePassword($p_id, $str_altesPassword, $str_neuesPassword, $str_neuesPasswordWiederholt)
    {
        //erneute Serverseitige Überprüfung, falls Clientprüfung umgangen wurde
        if ($str_neuesPassword == $str_neuesPasswordWiederholt){

            //SQL Abfrage auf aktuelles Passwort
            $sql = "SELECT password
                    FROM person
                    WHERE p_id = '" . $p_id . "';";

            $query = $this->db->prepare($sql);
            $query->execute();

            //Ergebnis der SQL Abfrage als Objekt zurückgeben, das angesprochen werden kann
            $result_set = $query->fetch(PDO::FETCH_OBJ);

            // using PHP 5.5's password_verify() function to check if the provided password fits
            // the hash of that user's password
            if (password_verify($str_altesPassword, $result_set->password)) {

                $str_neuesPasswordHash = password_hash($str_neuesPassword, PASSWORD_DEFAULT);

                $sql = "UPDATE person SET password=? WHERE p_id=?";
                $query = $this->db->prepare($sql);
                $query->execute(array($str_neuesPasswordHash,$p_id));

                echo true;
            }
            else{
                echo false;
            }
        }
        else{
            echo false;
        }
    }//end doChangeTel()


    public function getTrainingsdaten($p_id)
    {
        $sql = "SELECT trainingsgruppe.name FROM trainingsgruppe RIGHT JOIN teilnehmer_tg ON trainingsgruppe.tg_id = teilnehmer_tg.tg_id WHERE teilnehmer_tg.p_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($p_id));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }//end getTrainingsdaten()
}?>