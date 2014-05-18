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
            // $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


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
}?>