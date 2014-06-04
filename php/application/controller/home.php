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

    	//Session Variable wird gesetzt, dass die Headline der jeweiligen Subseite angezeigt werden kann
    	@session_start();
    	$_SESSION['subpage'] = "Home";

        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }

}
