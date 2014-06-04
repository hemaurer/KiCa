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

        //JSON formatieren, dass ein Zeilenumbruch im Kalender zwischen Uhrzeit und Titel angezeigt wird
        $trainingseinheitenDaten = $home_model->calendarBreakLines($trainingseinheitenDaten);
        $ligaDaten = $home_model->calendarBreakLines($ligaDaten);
        $freundschaftsDaten = $home_model->calendarBreakLines($freundschaftsDaten);
        $turnierDaten = $home_model->calendarBreakLines($turnierDaten);

    	//Session Variable wird gesetzt, dass die Headline der jeweiligen Subseite angezeigt werden kann
    	@session_start();
    	$_SESSION['subpage'] = "Home";

        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }

}

