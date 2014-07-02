<?php

class Training extends Controller
{

    public function index()
    {
        // load a model, perform an action, pass the returned data to a variable

        $tr_id = Application::$parm_1;

        if (isset($tr_id)){

	        $training_model = $this->loadModel('TrainingModel');
			$training = $training_model->get_Training($tr_id);
			$anwesenheitsliste = $training_model->get_Anwesenheitsliste($tr_id);
			$abwesenheitsliste = $training_model->get_Abwesenheitsliste($tr_id);
			$verwaltungs_model = $this->loadModel('VerwaltungsModel');
			$personen = $verwaltungs_model->get_alle_personen();
			$tr_id = $tr_id;
			$mannschaften = $verwaltungs_model->get_alle_mannschaften();
			$trainingsgruppen = $verwaltungs_model->get_alle_trainingsgruppen();

		}

	    require 'application/views/_templates/header.php';
        require 'application/views/training/index.php';
        require 'application/views/_templates/footer.php';
    }
	// Ein Button wurde geklickt
	/* public function edit_trainingseinheit() 
    {
        if (isset($_POST["submit_edit_trainingseinheit"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
			$verwaltungs_model->edit_trainingseinheit($_POST["tr_id"], $_POST["str_name"], $_POST["str_ort"], $_POST["d_time"], $_POST["d_date"], $_POST["str_tg_name"], $_POST["str_trainer"]);
             //Weiterleitung nach Ausführen der Methode
			header('location: ' . URL . 'termine/');
        }
		// Abbrechen, also zurück zur Terminübersicht
		if (isset($_POST["submit_abort"])) {
			header('location: ' . URL . 'termine/');
		}
    }*/
	// Ein Button wurde geklickt
	public function edit_anwesenheitsliste(){
		// Die Anwesenheit soll erneuer werden
		if (isset($_POST["submit_edit_anwesenheitsliste"])) {
			$training_model = $this->loadModel('TrainingModel');
			$training_model->set_Abwesenheitsliste($_POST["tr_id"], $_POST["p_ids"]);
			header('location: ' . URL . 'termine/');
		}
		// Abbrechen, also zurück zur Terminübersicht
		if (isset($_POST["submit_abort"])) {
			header('location: ' . URL . 'termine/');
		}
		// Anwesenheit speichern und eine PDF erzeugen
		if (isset($_POST["submit_create_PDF"])) {
			$training_model = $this->loadModel('TrainingModel');
			if (isset($_POST["p_ids"])){
				$training_model->set_Abwesenheitsliste($_POST["tr_id"], $_POST["p_ids"]);
			}
			$training_model->create_PDF($_POST["tr_id"]);
			//header('location: ' . URL . 'termine/');
		}
	}
}