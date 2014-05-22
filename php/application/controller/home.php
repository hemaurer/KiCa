<?php

class Home extends Controller
{

    public function index()
    {
    	//Session Variable wird gesetzt, dass die Headline der jeweiligen Subseite angezeigt werden kann
    	@session_start();
    	$_SESSION['subpage'] = "Home";

        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }

}
