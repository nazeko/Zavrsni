<?php
require_once("controller/IgracController.php");

// inicijalizacija klase
$IgracController = new IgracController;

// pozivanje metode
print $IgracController->update();
