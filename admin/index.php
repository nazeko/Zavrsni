<?php
if(empty($_COOKIE["authenticated_user_id"]))
{
    header("Location:login.php");
    die();
}



?>