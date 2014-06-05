<?php

class Verwaltung extends Controller
{

    public function index()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Verwaltung, using the method index().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $verwaltungs_model = $this->loadModel('VerwaltungsModel');
        $personen = $verwaltungs_model->get_alle_personen();
		$spiele = $verwaltungs_model->get_alle_spiele();
		$mannschaften = $verwaltungs_model->get_alle_mannschaften();
        $trainingseinheiten = $verwaltungs_model->get_alle_trainingseinheiten();
		$trainingsgruppen = $verwaltungs_model->get_alle_trainingsgruppen();
		$turniere = $verwaltungs_model->get_alle_turniere();
		$stats = $verwaltungs_model->get_alle_stats();
		$sparten = $verwaltungs_model->get_alle_sparten();

        //Session Variable wird gesetzt, dass die Headline der jeweiligen Subseite angezeigt werden kann
        @session_start();
        $_SESSION['subpage'] = "Verwaltung";

        // load views
        require 'application/views/_templates/header.php';
        require 'application/views/verwaltung/index.php';
        require 'application/views/_templates/footer.php';
    }

/***Person***/

    public function add_person()
    {
        if (isset($_POST["submit_add_person"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_person($_POST["str_nachname"], $_POST["str_vorname"], $_POST["d_date"], $_POST["int_groesse"], $_POST["b_betreuer"], $_POST["int_tel"]);
		}
		header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_person()
    {

        //if (isset($_POST["submit_edit_person"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_person($_POST["p_id"], $_POST["str_nachname"], $_POST["str_vorname"], $_POST["d_date"], $_POST["int_groesse"], $_POST["b_betreuer"], $_POST["int_tel"]);
        //}
        //header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function reset_password()
	{
		$verwaltungs_model = $this->loadModel('VerwaltungsModel');
        $verwaltungs_model->reset_password($_POST["p_id"]);
	}
    public function delete_person()
    {	@session_start();
		if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){

        if (isset($_POST["del_id"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_person($_POST["del_id"]);
        }
        //header('location: ' . URL . 'verwaltung/');
		}
		else{
			echo "Diese Seite ist für Sie gesperrt";}
    }

/***Spiele***/

    public function add_spiel()
    {

        if (isset($_POST["submit_add_spiel"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_spiel($_POST["str_ort"], $_POST["str_heim"], $_POST["str_auswaerts"], $_POST["int_h_tore"], $_POST["int_a_tore"], $_POST["str_stat_name"], $_POST["d_date"], $_POST["d_time"],$_POST["str_tu_name"], $_POST["str_sparte"]);
        }
        //header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_spiel()
    {

        if (isset($_POST["submit_edit_spiel"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_spiel($_POST["s_id"], $_POST["str_ort"], $_POST["int_heim"], $_POST["int_auswaerts"], $_POST["int_h_tore"], $_POST["int_a_tore"], $_POST["int_stat_id"], $_POST["d_zeit"], $_POST["int_tu_id"]);
        }
        header('location: ' . URL . 'verwaltung/index'); //Weiterleitung nach Ausführen der Methode
    }
    public function delete_spiel()
    {
        if (isset($_POST["del_id"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_spiel($_POST["del_id"]);
        }
        //header('location: ' . URL . 'verwaltung/');
    }

/***Mannschaften***/

    public function add_mannschaft()
    {
        if (isset($_POST["submit_add_mannschaft"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_mannschaft($_POST["str_name"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_mannschaft()
    {
        if (isset($_POST["submit_edit_mannschaft"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_mannschaft($_POST["m_id"], $_POST["str_name"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
    public function delete_mannschaft()
    {
        if (isset($_POST["del_id"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_mannschaft($_POST["del_id"]);
        }
        //header('location: ' . URL . 'verwaltung/');
    }

/***Trainingseinheiten***/

    public function add_trainingseinheit()
    {
        if (isset($_POST["submit_add_trainingseinheit"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_trainingseinheit($_POST["str_name"], $_POST["str_ort"], $_POST["d_date"], $_POST["d_time"], $_POST["str_tg_name"], $_POST["str_trainer"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_trainingseinheit()
    {
        if (isset($_POST["submit_edit_trainingseinheit"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_trainingseinheit($_POST["tr_id"], $_POST["str_name"], $_POST["str_ort"], $_POST["d_zeit"], $_POST["int_tg_id"], $_POST["int_trainer"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
    public function delete_trainingseinheit()
    {
        if (isset($_POST["del_id"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_trainingseinheit($_POST["del_id"]);
        }
        //header('location: ' . URL . 'verwaltung/');
    }

/***Trainingsgruppe***/

    public function add_trainingsgruppe()
    {
        if (isset($_POST["submit_add_trainingsgruppe"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_trainingsgruppe($_POST["str_name"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_trainingsgruppe()
    {
        if (isset($_POST["submit_edit_trainingsgruppe"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_trainingsgruppe($_POST["tg_id"], $_POST["str_name"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
    public function delete_trainingsgruppe()
    {
        if (isset($_POST["del_id"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_trainingsgruppe($_POST["del_id"]);
        }
        //header('location: ' . URL . 'verwaltung/');
    }

/***Turnier***/

    public function add_turnier()
    {
        if (isset($_POST["submit_add_turnier"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_turnier($_POST["str_name"], $_POST["int_liga"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_turnier()
    {
        //if (isset($_POST["submit_edit_turnier"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_turnier($_POST["tu_id"], $_POST["str_name"], $_POST["int_liga"]);
        // }
        // header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
    public function delete_turnier(/*$tu_id*/)
    {
        // if (isset($tu_id)) {
            // $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            // $verwaltungs_model->delete_turnier($tu_id);
        // }
		if (isset($_POST["del_id"])) {
			$verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_turnier($_POST["del_id"]);
        }
        //header('location: ' . URL . 'verwaltung/');
    }
	public function add_sparte()
    {
        if (isset($_POST["submit_add_sparte"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_sparte($_POST["str_name"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }




}


?>
