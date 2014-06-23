<?php

class Training extends Controller
{

    public function index($tr_id)
    {
        // load a model, perform an action, pass the returned data to a variable
        $training_model = $this->loadModel('TrainingModel');
		$training = $training_model->get_Training($tr_id);

		$verwaltungs_model = $this->loadModel('VerwaltungsModel');
		$personen = $verwaltungs_model->get_alle_personen();
		
		$mannschaften = $verwaltungs_model->get_alle_mannschaften();
		$trainingsgruppen = $verwaltungs_model->get_alle_trainingsgruppen();
	    require 'application/views/_templates/header.php';
        require 'application/views/training/index.php';
        require 'application/views/_templates/footer.php';
    }
	
	public function edit_trainingseinheit()
    {
        if (isset($_POST["submit_edit_trainingseinheit"])) {
            $verwaltungs_model = $this->loadModel('VerwaltungsModel');
			$verwaltungs_model->edit_trainingseinheit($_POST["tr_id"], $_POST["str_name"], $_POST["str_ort"], $_POST["d_time"], $_POST["d_date"], $_POST["str_tg_name"], $_POST["str_trainer"]);
             //Weiterleitung nach Ausführen der Methode
			header('location: ' . URL . 'termine/');
        }
    }
}