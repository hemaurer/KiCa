<?php

class Spiel extends Controller
{

    public function index()
    {
		// load a model, perform an action, pass the returned data to a variable
		$spiel_model= $this->loadModel('SpielModel');

 		//Den ersten Parameter aus der URL auslesen und zur Anzeige der Liga Tabelle weitergeben
		$s_id = Application::$parm_1;

		if (isset($s_id)){
			$spiel = $spiel_model->get_Spiel($s_id);
			$aufstellung = $spiel_model->get_Aufstellung($s_id);

			$verwaltungs_model = $this->loadModel('VerwaltungsModel');
			$personen = $verwaltungs_model->get_alle_personen();

		}
	    require 'application/views/_templates/header.php';
        require 'application/views/spiel/index.php';
        require 'application/views/_templates/footer.php';
    }
	// Ein Button wurde geklickt
	public function edit_aufstellung()
    {
		// Aufstellung soll verändert werden
        if (isset($_POST["submit_edit_aufstellung"])) {
			$spiel_model= $this->loadModel('SpielModel');
			$spiel_model->set_aufstellung($_POST['s_id'], $_POST['arr_aufstellung']);
             //Weiterleitung nach Ausführen der Methode
			header('location: ' . URL . 'termine/');
        }
		// Abbrechen, zurück zur Terminübersicht
		if (isset($_POST["submit_abort"])) {
			header('location: ' . URL . 'termine/');
		}
		// Aufstellung speichern und PDF erstellen
		if (isset($_POST["submit_create_PDF"])) {
			$spiel_model = $this->loadModel('SpielModel');
			$spiel_model->set_aufstellung($_POST['s_id'], $_POST['arr_aufstellung']);
			$spiel_model->create_PDF($_POST["s_id"]);
			//header('location: ' . URL . 'termine/');
		}
    }
}