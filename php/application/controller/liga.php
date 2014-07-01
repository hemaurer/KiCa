<?php

class Liga extends Controller
{

    public function index()
    {
        $liga_model = $this->loadModel('LigaModel');

        //Den ersten Parameter aus der URL auslesen und zur Anzeige der Liga Tabelle weitergeben
        $s_id = Application::$parm_1;
        $ligatabelle = $liga_model->get_ligatabelle($s_id);

        require 'application/views/_templates/header.php';
        require 'application/views/liga/index.php';
        require 'application/views/_templates/footer.php';
    }

}
?>
