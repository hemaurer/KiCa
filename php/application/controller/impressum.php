<?php

class Impressum extends Controller
{

    public function index()
    {
        require 'application/views/_templates/header.php';
        require 'application/views/impressum/index.php';
        require 'application/views/_templates/footer.php';
    }

}