<?php

class Turniere extends Controller
{

    public function index($s_id)
    {
        // load a model, perform an action, pass the returned data to a variable
        $turniere_model = $this->loadModel('TurniereModel');

        $turniertabelle = $turniere_model->get_turniertabelle($s_id);

        require 'application/views/_templates/header.php';
        require 'application/views/turniere/index.php';
        require 'application/views/_templates/footer.php';
    }

}
?>
