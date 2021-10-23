<?php
require_once("controller/DrzavaController.php");

// inicijalizacija klase
$DrzavaController = new DrzavaController;

// pozivanje metode
print $DrzavaController->delete();
