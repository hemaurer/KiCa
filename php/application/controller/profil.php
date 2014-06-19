<?php

class Profil extends Controller
{
    public function index()
    {
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"

        $profil_model = $this->loadModel('ProfilModel');

        //Session Variable wird gesetzt
        @session_start();

        $trainingsDaten = $profil_model->getTrainingsdaten($_SESSION["p_id"]);

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/profil/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function doChangeProfilbild()
    {
        if (isset($_POST["submit_change_profilbild"])) {
            @session_start();
            $profil_model = $this->loadModel('ProfilModel');
            $profil_model->doChangeProfilbild($_SESSION["p_id"]);

            header('location: ' . URL . 'profil/index/'); //Weiterleitung nach Ausführen der Methode
        }
    }//end doChangeProfilbild()

    public function doChangeGroesse()
    {
        if (isset($_POST["int_groesse"])) {
            @session_start();
            $profil_model = $this->loadModel('ProfilModel');
            $profil_model->doChangeGroesse($_SESSION["p_id"], $_POST["int_groesse"]);

        }
    }//end doChangeGroesse()

    public function doChangeTel()
    {
        if (isset($_POST["str_tel"])) {
            @session_start();
            $profil_model = $this->loadModel('ProfilModel');
            $profil_model->doChangeTel($_SESSION["p_id"], $_POST["str_tel"]);

        }
    }//end doChangeTel()

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