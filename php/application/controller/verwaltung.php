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
		$turniere_detail = $verwaltungs_model->get_alle_turniere_detail();
		$stats = $verwaltungs_model->get_alle_stats();
		$sparten = $verwaltungs_model->get_alle_sparten();

        // load views
        require 'application/views/_templates/header.php';
        require 'application/views/verwaltung/index.php';
        require 'application/views/_templates/footer.php';
    }

/***Person***/
	public function get_person()
    {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->get_person($_POST["p_id"]);
    }
    public function add_person()
    {
        if (isset($_POST["submit_add_person"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_person($_POST["str_nachname"], $_POST["str_vorname"], $_POST["d_date"], $_POST["int_groesse"], $_POST["b_betreuer"], $_POST["int_tel"]);
			header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
		}
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
	public function get_spiel()
    {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->get_spiel($_POST["s_id"]);
    }
    public function add_spiel()
    {
        if (isset($_POST["submit_add_spiel"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_spiel($_POST["str_ort"], $_POST["str_heim"], $_POST["str_auswaerts"], $_POST["int_h_tore"], $_POST["int_a_tore"], $_POST["str_stat_name"], $_POST["d_date"], $_POST["d_time"],$_POST["str_tu_name"], $_POST["str_sparte"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_spiel()
    {
		$verwaltungs_model = $this->loadModel('VerwaltungsModel');
		$verwaltungs_model->edit_spiel($_POST["s_id"], $_POST["str_ort"], $_POST["str_heim"], $_POST["str_auswaerts"], $_POST["int_h_tore"], $_POST["int_a_tore"], $_POST["str_stat_name"], $_POST["d_date"], $_POST["d_time"],$_POST["str_tu_name"], $_POST["str_sparte"]);
    }
    public function delete_spiel()
    {
        if (isset($_POST["del_id"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_spiel($_POST["del_id"]);
        }
    }
	public function get_select_options()
	{
		$verwaltungs_model = $this->loadModel('VerwaltungsModel');
        $verwaltungs_model->get_select_options($_POST["int_index"], $_POST["str_selectedOption"], $_POST["nextSelectId"], $_POST["str_sparteValue"], $_POST["str_statusValue"], $_POST["str_turnierValue"], $_POST["str_heimValue"], $_POST["str_auswaertsValue"]);
		
	}
	public function get_select_prefill()
	{
		$verwaltungs_model = $this->loadModel('VerwaltungsModel');
        $verwaltungs_model->get_select_prefill($_POST["str_sparteValue"], $_POST["str_statusValue"], $_POST["str_turnierValue"], $_POST["str_heimValue"], $_POST["str_auswaertsValue"]);
		
	}
/***Mannschaften***/
	public function get_mannschaft()
    {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->get_mannschaft($_POST["m_id"]);
    }
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
        //if (isset($_POST["submit_edit_mannschaft"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_mannschaft($_POST["m_id"], $_POST["str_name"]);
        //}
        //header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
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
	public function get_trainingseinheit()
    {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->get_trainingseinheit($_POST["tr_id"]);
    }
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
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_trainingseinheit($_POST["tr_id"], $_POST["str_name"], $_POST["str_ort"], $_POST["d_date"], $_POST["d_time"], $_POST["str_tg_name"], $_POST["str_trainer"]);
    }
    public function delete_trainingseinheit()
    {
        if (isset($_POST["del_id"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_trainingseinheit($_POST["del_id"]);
        }
    }

/***Trainingsgruppe***/
	public function get_trainingsgruppe()
    {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->get_trainingsgruppe($_POST["tg_id"]);
    }
    public function add_trainingsgruppe()
    {
        if (isset($_POST["submit_add_trainingsgruppe"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_trainingsgruppe($_POST["str_name"], $_POST["arr_teilnehmer_option"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_trainingsgruppe()
    {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_trainingsgruppe($_POST["tg_id"], $_POST["str_name"], $_POST["arr_teilnehmer_option"]);
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
	public function get_turnier()
    {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->get_turnier($_POST["tu_id"]);
    }
    public function add_turnier()
    {
        if (isset($_POST["submit_add_turnier"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_turnier($_POST["str_name"], $_POST["int_liga"], $_POST["arr_sparte_option"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_turnier()
    {
        //if (isset($_POST["submit_edit_turnier"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
			if (isset ($_POST["arr_sparte_option"])){
            $verwaltungs_model->edit_turnier($_POST["tu_id"], $_POST["str_name"], $_POST["int_liga"], $_POST["arr_sparte_option"]);
			}else{
				$verwaltungs_model->edit_turnier($_POST["tu_id"], $_POST["str_name"], $_POST["int_liga"], null);
			}
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
/*Turnier-Sparte*/
	public function get_turnier_sparte()
	{
			$verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->get_turnier_sparte($_POST["tu_id"], $_POST["sparte_id"]);
	}
	public function edit_turnier_sparte()
	{
		$verwaltungs_model = $this->loadModel('VerwaltungsModel');
        $verwaltungs_model->edit_turnier_sparte($_POST["tu_id"], $_POST["sparte_id"], $_POST["arr_mannschaft_option"], $_POST["str_gewinner"]);
	}
	public function delete_turnier_sparte(/*$tu_id*/)
    {
		if ((isset($_POST["sparte_id"])) && (isset($_POST["tu_id"]))) {
			$verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_turnier_sparte($_POST["tu_id"], $_POST["sparte_id"]);
        }
    }
/*Sparte*/
	public function get_sparte()
    {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->get_sparte($_POST["sparte_id"]);
    }
	public function add_sparte()
    {
        if (isset($_POST["submit_add_sparte"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_sparte($_POST["str_name"]);
        }
        header('location: ' . URL . 'verwaltung/'); //Weiterleitung nach Ausführen der Methode
    }
	
	public function edit_sparte()
    {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_sparte($_POST["sparte_id"], $_POST["str_name"]);
    }
    public function delete_sparte()
    {
        if (isset($_POST["del_id"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_sparte($_POST["del_id"]);
        }
    }
}
?>
