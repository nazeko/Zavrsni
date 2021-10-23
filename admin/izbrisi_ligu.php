<?php
require_once("controller/LigaController.php");

// inicijalizacija klase
$LigaController = new LigaController;

// pozivanje metode
print $LigaController->delete();
