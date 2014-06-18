<?php

class Home extends Controller
{

    public function index()
    {

    	$home_model = $this->loadModel('HomeModel');

        //Daten für den Home Kalender laden
        //Die Spiele erhalten die erste Sparte als Standardwert, da dieser Standardmäßig auf der Home Seite angezeigt wird
        //über das Dropdown Menü können die anderen Sparten an späterer Stelle geladen werden
        $trainingseinheitenDaten = $home_model->getTrainingseinheitenDaten();
        $ligaDaten = $home_model->getLigaDaten(1);
        $freundschaftsDaten = $home_model->getFreundschaftsDaten(1);
    	$turnierDaten = $home_model->getTurnierDaten(1);

        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }

    //Lädt die Daten je nach ausgewählter Sparte aus der Datenbank, um sie im Kalender darzustellen
    public function getKalenderDaten(){

        $home_model = $this->loadModel('HomeModel');

        $ligaDaten = $home_model->getLigaDaten($_POST["sparte_id"]);
        $freundschaftsDaten = $home_model->getFreundschaftsDaten($_POST["sparte_id"]);
        $turnierDaten = $home_model->getTurnierDaten($_POST["sparte_id"]);

        $arr = array();
        $arr[0] = $ligaDaten;
        $arr[1] = $freundschaftsDaten;
        $arr[2] = $turnierDaten;

        echo json_encode($arr);

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