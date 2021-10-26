<?php
require_once("controller/UtakmicaController.php");

// inicijalizacija klase
$UtakmicaController = new UtakmicaController;

// pozivanje metode
print $UtakmicaController->deleteSazetak();
