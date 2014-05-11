<?php

class Verwaltung extends Controller
{
    public function index()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Verwaltung, using the method index().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $verwaltungs_model = $this->loadModel('VerwaltungsModel');
        $personen = $verwaltungs_model->get_alle_personen();
		$spiele = $verwaltungs_model->get_alle_spiele();
        // load another model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        //$stats_model = $this->loadModel('StatsModel');
        //$amount_of_songs = $stats_model->getAmountOfSongs();

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/verwaltung/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function add_person()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Verwaltung, using the method add_person().';

        if (isset($_POST["submit_add_person"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_person($_POST["str_nachname"], $_POST["str_vorname"], $_POST["d_gebdatum"], $_POST["int_groesse"], $_POST["str_bild"], $_POST["b_betreuer"], $_POST["int_tel"], $_POST["str_user"], $_POST["str_password"]);
        }
        header('location: ' . URL . 'verwaltung/index'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_person()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Verwaltung, using the method add_person().';

        if (isset($_POST["submit_edit_person"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_person($_POST["p_id"], $_POST["str_nachname"], $_POST["str_vorname"], $_POST["d_gebdatum"], $_POST["int_groesse"], $_POST["str_bild"], $_POST["b_betreuer"], $_POST["int_tel"], $_POST["str_user"], $_POST["str_password"]);
        }
        header('location: ' . URL . 'verwaltung/index'); //Weiterleitung nach Ausführen der Methode
    }
    public function delete_person($p_id)
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Verwaltung, using the method delete_person().';

        if (isset($p_id)) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_person($p_id);
        }
        header('location: ' . URL . 'verwaltung/index');
    }

/***Spiele***/	

    public function add_spiel()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Verwaltung, using the method add_person().';

        if (isset($_POST["submit_add_spiel"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->add_spiel($_POST["str_ort"], $_POST["int_heim"], $_POST["int_auswaerts"], $_POST["int_h_tore"], $_POST["int_a_tore"], $_POST["int_stat_id"], $_POST["d_zeit"], $_POST["int_tu_id"]);
        }
        //header('location: ' . URL . 'verwaltung/index'); //Weiterleitung nach Ausführen der Methode
    }
	public function edit_spiel()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Verwaltung, using the method add_person().';

        if (isset($_POST["submit_edit_spiel"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->edit_person($_POST["s_id"], $_POST["str_ort"], $_POST["int_heim"], $_POST["int_auswaerts"], $_POST["int_h_tore"], $_POST["int_a_tore"], $_POST["int_stat_id"], $_POST["d_zeit"], $_POST["int_tu_id"]);
        }
        header('location: ' . URL . 'verwaltung/index'); //Weiterleitung nach Ausführen der Methode
    }
    public function delete_spiel($s_id)
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Verwaltung, using the method delete_person().';

        if (isset($s_id)) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
            $verwaltungs_model->delete_person($s_id);
        }
        header('location: ' . URL . 'verwaltung/index');
    }
}
?>
