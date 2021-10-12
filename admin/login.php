<?php


require_once("controller/LoginController.php");

$loginController = new LoginController;

print $loginController->login();
