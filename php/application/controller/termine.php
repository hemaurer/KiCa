<?php

class Termine extends Controller
{

    public function index()
    {
        // load a model, perform an action, pass the returned data to a variable
        $termine_model = $this->loadModel('TermineModel');

        $termine_spiele = $termine_model->get_alle_spiele();
        $termine_trainingseinheiten = $termine_model->get_alle_trainingseinheiten();

        //Session Variable wird gesetzt, dass die Headline der jeweiligen Subseite angezeigt werden kann
        @session_start();
        $_SESSION['subpage'] = "Termine";

        require 'application/views/_templates/header.php';
        require 'application/views/termine/index.php';
        require 'application/views/_templates/footer.php';
    }

}
?>
