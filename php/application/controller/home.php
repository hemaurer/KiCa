<?php

class Home extends Controller
{

    public function index()
    {

    	$home_model = $this->loadModel('HomeModel');

        //Daten für den Home Kalender laden
        $trainingseinheitenDaten = $home_model->getTrainingseinheitenDaten();
        $ligaDaten = $home_model->getLigaDaten();
        $freundschaftsDaten = $home_model->getFreundschaftsDaten();
    	$turnierDaten = $home_model->getTurnierDaten();

        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }

    //Kalender Details nach dem Klick auf einen Eintrag im Home-Kalendar laden zur Anzeige im Details Modal
    public function getKalenderDetails()
    {

        if($_POST["className"] == "training"){
            $home_model = $this->loadModel('HomeModel');
            $home_model->getKalenderDetails_training($_POST["id"]);
        }
        // wenn es sich nicht um eine Trainingseinheit handelt, ist es ein Spiel
        else{
            $home_model = $this->loadModel('HomeModel');
            $home_model->getKalenderDetails_spiel($_POST["id"]);
        }

    }//end getKalenderDetails()

}

