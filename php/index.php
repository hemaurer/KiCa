<?php

// load application config (error reporting etc.)
require 'application/config/config.php';

// load application class
require 'application/libs/application.php';
require 'application/libs/controller.php';

// start the application
$app = new Application();

// wird benötigt, dass der Kalender beim besuchen der Home Seite korrekt geladen wird,
// da der Controller von Home sonst nicht ausgeführt wird, und man erst nochmal auf Home klicken muss
// wird die Zeile aber hinzugefügt, funktioniert der Kalender nicht mehr -> Workaround finden
// header('location: ' . URL . 'home/');
?>