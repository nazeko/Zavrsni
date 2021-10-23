<?php
require_once("controller/KlubController.php");

// inicijalizacija klase
$KlubController = new KlubController;

// pozivanje metode
print $KlubController->update();
