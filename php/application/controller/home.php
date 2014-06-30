<?php

class Home extends Controller
{

    public function index()
    {

    	$home_model = $this->loadModel('HomeModel');

        //Daten für den Home Kalender laden
        //Die Spiele erhalten die erste Sparte als Standardwert, da dieser Standardmäßig auf der Home Seite angezeigt wird
        //über das Dropdown Menü können die anderen Sparten an späterer Stelle geladen werden

        //Ist ein User eingeloggt, werden nur die eigenen Trainings gezeigt, sonst alle Trainings
        @session_start();
        if (isset($_SESSION['user_login_status'])){
            $trainingseinheitenDaten = $home_model->getEigeneTrainingseinheiten($_SESSION['p_id']);
            //Trainings anzeigen, in denen ein User Trainer ist
            $trainerDaten = $home_model->getTrainerDaten($_SESSION['p_id']);
        }
        else{
            $trainingseinheitenDaten = $home_model->getAlleTrainingseinheiten();
            $trainerDaten = "{}";
        }

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

        //Nicht eingeloggt: Trainer Daten ausblenden und alle Trainings anzeigen
        if (!isset($_SESSION['user_login_status'])){
            $trainerDaten = "{}";
            $trainingseinheitenDaten = $home_model->getAlleTrainingseinheiten();
        }

        //Ist ein User eingeloggt, werden nur die eigenen Trainings gezeigt, sonst alle Trainings
        @session_start();
        if (isset($_SESSION['user_login_status']) && $_POST["eigeneTrainings"] == "ja"){
            $trainingseinheitenDaten = $home_model->getEigeneTrainingseinheiten($_SESSION["p_id"]);
            $trainerDaten = $home_model->getTrainerDaten($_SESSION['p_id']);
        }

        //Eingeloggt und alle Trainings anzeigen ausgewählt
        if (isset($_SESSION['user_login_status']) && $_POST["eigeneTrainings"] == "nein"){
            $trainerDaten = "{}";
            $trainingseinheitenDaten = $home_model->getAlleTrainingseinheiten();
        }

        $ligaDaten = $home_model->getLigaDaten($_POST["sparte_id"]);
		$turnierDaten = $home_model->getTurnierDaten($_POST["sparte_id"]);
        $freundschaftsDaten = $home_model->getFreundschaftsDaten($_POST["sparte_id"]);

        //Daten als Zeichenkette zurückgeben, die über "|" wieder getrennt werden kann
        //Workaround für aufgetretene Array-Probleme
        echo $trainingseinheitenDaten;
		echo '|';
        echo $trainerDaten;
        echo '|';
        echo $ligaDaten;
        echo '|';
		echo $turnierDaten;
		echo '|';
      	echo $freundschaftsDaten;

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