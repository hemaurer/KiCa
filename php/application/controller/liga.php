<?php

class Liga extends Controller
{

    public function index($s_id)
    {
        // load a model, perform an action, pass the returned data to a variable
        $liga_model = $this->loadModel('LigaModel');

        $ligatabelle = $liga_model->get_ligatabelle($s_id);

        //Session Variable wird gesetzt, dass die Headline der jeweiligen Subseite angezeigt werden kann
        @session_start();
        $_SESSION['subpage'] = "Liga";

        require 'application/views/_templates/header.php';
        require 'application/views/liga/index.php';
        require 'application/views/_templates/footer.php';
    }

}
?>
