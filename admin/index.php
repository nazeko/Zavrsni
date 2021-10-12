<?php
if(empty($_COOKIE["authCookie"]))
{
    header("Location:login.php");
    die();
}
require_once("controller/DashboardController.php");

$dashController = new DashboardController;

print $dashController->index();

?>