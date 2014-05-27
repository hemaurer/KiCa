<?php

class Liga extends Controller
{

    public function index()
    {
        // load a model, perform an action, pass the returned data to a variable
        $liga_model = $this->loadModel('LigaModel');

        $ligatabelle = $liga_model->get_ligatabelle();

        require 'application/views/_templates/header.php';
        require 'application/views/liga/index.php';
        require 'application/views/_templates/footer.php';
    }

}
?>
