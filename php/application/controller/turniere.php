<?php

class Turniere extends Controller
{

    public function index($sparte_id, $tu_id)
    {
        // load a model, perform an action, pass the returned data to a variable
        $turniere_model = $this->loadModel('TurniereModel');

        $turnierspiele = $turniere_model->get_turnierSpiele($sparte_id, $tu_id);
		$str_winner = $turniere_model->get_winner($sparte_id, $tu_id);

        require 'application/views/_templates/header.php';
        require 'application/views/turniere/index.php';
        require 'application/views/_templates/footer.php';
    }

}
?>
