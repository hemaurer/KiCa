<?php

class Profil extends Controller
{
    public function index()
    {

        $profil_model = $this->loadModel('ProfilModel');

        //Session Variable wird gesetzt
        @session_start();
        if (isset($_SESSION['user_login_status'])){
           $trainingsDaten = $profil_model->getTrainingsdaten($_SESSION["p_id"]);
        }

        // Views laden
        require 'application/views/_templates/header.php';
        require 'application/views/profil/index.php';
        require 'application/views/_templates/footer.php';
    }

    // Profilbild ändern / zurücksetzen
    public function doChangeProfilbild()
    {
            @session_start();
            $profil_model = $this->loadModel('ProfilModel');
            $profil_model->doChangeProfilbild($_SESSION["p_id"], $_POST["resetProfilbild"]);

            header('location: ' . URL . 'profil/'); //Weiterleitung nach Ausführen der Methode
    }//end doChangeProfilbild()

    // Größe ändern
    public function doChangeGroesse()
    {
        // Auf Zahl prüfen
        if (isset($_POST["int_groesse"])){
            if (is_numeric($_POST["int_groesse"]) && $_POST["int_groesse"] < 250){
                @session_start();
                $profil_model = $this->loadModel('ProfilModel');
                $profil_model->doChangeGroesse($_SESSION["p_id"], $_POST["int_groesse"]);
            }
        }
    }//end doChangeGroesse()

    // Telefonnummer ändern
    public function doChangeTel()
    {
        // Muss nicht auf Zahl geprüft werden - ist in der DB als varchar definiert
        if (isset($_POST["str_tel"])) {
            @session_start();
            $profil_model = $this->loadModel('ProfilModel');
            $profil_model->doChangeTel($_SESSION["p_id"], $_POST["str_tel"]);

        }
    }//end doChangeTel()

    // Passwort ändern
    public function doChangePassword()
    {
        if (isset($_POST["str_altesPassword"])) {
            @session_start();
            $profil_model = $this->loadModel('ProfilModel');
            $profil_model->doChangePassword($_SESSION["p_id"], $_POST["str_altesPassword"], $_POST["str_neuesPassword"], $_POST["str_neuesPasswordWiederholt"]);

        }
    }//end doChangePassword()

}
?>